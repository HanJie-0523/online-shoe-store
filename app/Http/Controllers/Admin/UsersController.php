<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = User::query();

        //For search
        if($request->search){
            $query->where(function ($q) use ($request){
                $q->where('name','like','%'.$request->search.'%');
                $q->orwhere('email','like','%'.$request->search.'%');
                $q->orwhere('contact','like','%'.$request->search.'%');
                $q->orwhere('address','like','%'.$request->search.'%');
            });
        }

        // dd($query);
        // $users = User::orderBy('created_at')->paginate(5);
        $users = $query->paginate(10);

        return view('admin.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            //unique:table,column.
            'email' => ['required','unique:users,email'],
            'password'=>'required',
            'address'=>'required',
            'contact'=>'required',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address'=> $request->address,
            'contact'=> $request->contact,
        ]);
        $user->roles()->attach(Role::where('name', 'user')->first()->id);
        Cart::create([
            'user_id' => $user->id,
        ]);

        return redirect(route('admin.users.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::findOrFail($id);


        return view('admin.users.edit',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'contact' => 'required',
        ]);

        $user = User::find($id);

        $user->update($request->all());

        return redirect(route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
