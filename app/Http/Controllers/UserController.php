<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];        
        
        return response()->json([
            'acess' => Auth::attempt($credentials),
            'failure' => 'e-mail ou senha errado'
        ],200);
    }

    public function register(Request $request)
    {
        // dd($request->all());
        User::create($request->all());
    }

    public function register_user(Request $request)
    {

    }

    public function register_company(Request $request)
    {

    }
}