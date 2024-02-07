<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login.index');
    }

    public function signIn(Request $request)
    {

        if(!Auth::attempt($request->only(['email', 'password'])))
            return redirect()->back()->withErrors('Usuário ou senha inválidos');

        return to_route('series.index');
    }

    public function register()
    {
        return view('pages.login.register');
    }

    public function signUp(Request $request)
    {

        $request['password'] = Hash::make($request['password']);
        
        $user = User::create($request->except('_token'));

        Auth::login($user);

        return to_route('series.index');

    }

    public function logout()
    {
        Auth::logout();

        return to_route('login');
    }
}
