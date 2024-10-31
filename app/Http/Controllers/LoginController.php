<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Providers\RouteServiceProvider;
//use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreLoginRequest;
use App\Http\Requests\UpdateLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
     
    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoginRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'a@b.cl',
            'password' => Hash::make('admin'),
        ]);
        $val = Auth::Login($user);
        //return response()->json(['res'=> true,'data'=>$user,'val'=>$val]);
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Login $login)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLoginRequest $request, Login $login)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Login $login)
    {
        //
    }
}
