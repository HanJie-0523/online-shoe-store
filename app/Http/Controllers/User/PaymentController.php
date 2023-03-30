<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\PaymentSuccessMail;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;

class PaymentController extends Controller
{

    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        //set it to 'false' when go live
        $this->gateway->setTestMode(true);
    }

    public function createPayment(Request $request, Order $order)
    {

        // $gateway = Omnipay::setGateway('paypal');
        $response = $this->gateway->purchase([
            'name' => 'Shoes Store',
            'description' => $order->id,
            'amount' => $order->amount,
            'currency' => env('PAYPAL_CURRENCY'),
            'returnUrl' => route('orders.paymentCallback', $order),
            'cancelUrl' => route('user.orders.show', ['order' => $order]),
        ])->send();

        // dd($response);
        if ($response->isRedirect()) {
            $response->redirect();
        } else {
            return redirect(route('orders.paymentCallback', $order));
        }
    }

    public function paymentCallback(Request $request, Order $order)
    {
        $user = Auth::user();
        // $gateway = Omnipay::setGateway('paypal');
        // $response = $this->gateway->purchase([
        //     'name' => $order->name,
        //     'description' => $order->id,
        //     'amount' => $order->amount,
        //     'currency' => env('PAYPAL_CURRENCY'),
        //     'returnUrl' => url('payment-success'),
        //     'cancelUrl' => url('payment-failed'),
        // ])->send();




        // $transaction = $this->gateway->completePurchase([
        //     'user_id' => $request->input('PayerID'),
        //     'transaction_id' => $request->input('TransactionID'),
        // ]);
        // $response = $transaction->send();

        // if ($response->isSuccess()) {
        //     Order->setAsPaid();
        //     return redirect('payment-success');
        // } else {
        //     return redirect('payment-failed');
        // }
        $transaction = $this->gateway->completePurchase([
            'payer_id' => $request->input('PayerID'),
            'transactionReference' => $request->input('paymentId')
        ]);
        $response = $transaction->send();


        if ($response->isSuccessful()) {
            // dd($order);
            $order->update([
                'status' => 'paid',
            ]);
            Payment::create([
                'status' => 'success',
                'order_id' => $order->id,
            ]);


            Mail::to($user->email)->send(new PaymentSuccessMail($order));
            // die('Successful purchase');
            return redirect(route('orders.success'));
        } else {
            return redirect(route('orders.failed'));
            // return redirect('payment-failed');
        }
    }

    public function paymentFailed()
    {
        return view('user.payments.failed');
    }

    public function paymentSuccess()
    {
        return view('user.payments.success');
    }
}
