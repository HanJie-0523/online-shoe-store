<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\Role;
use App\Models\Cart;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Mail;

class GithubLoginController extends Controller
{
    public function login(Request $request)
    {
        //

        return Socialite::driver('github')->redirect();
    }

    public function loggedin(Request $request)
    {
        $githubUser = Socialite::driver('github')->user();

        $user = User::where('github_id', $githubUser->id)->first();


        if (!$user) {
            // new user
            $user = User::create([
                'github_id' => $githubUser->id,
                'name' => $githubUser->name,
                'email' => $githubUser->email,
            ]);
            $user->roles()->attach(Role::where('name', 'user')->first()->id);

            Cart::create([
                'user_id' => $user->id,
            ]);

            Mail::to($user->email)->send(new WelcomeMail());
        }

        // $user
        Auth::login($user);

        $redirectUrl = $request->input('redir', RouteServiceProvider::HOME);

        return redirect()->intended($redirectUrl);

    }
}
