<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login()
    {
        return view('users/login');
    }

    public function loginUser(LoginUserRequest $request)
    {
        if($request->validated()) {
            if(\Auth::attempt([
                'email' => $request->get('email'),
                'password' => $request->get('password')
            ])) {
                return redirect('/');
            } else {
                return redirect()->back()->with('error', 'Wrong credentials');
            }
        }
    }

    public function registerPage()
    {
        return view('users/register');
    }

    public function registerUser(RegisterUserRequest $request)
    {
        if($payload = $request->validated()) {
            $user = User::create($payload);

            auth()->login($user);

            return redirect('/')->with('success', "Account successfully registered.");
        }

        return redirect('auth/login');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect('login');
    }

    public function googleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallbackHandler()
    {
        $user = Socialite::driver('google')->user();

        $data = User::whereEmail($user->email)->first();

        if(!$data) {
            $record = [];
            $record['name'] = $user->name;
            $record['email'] = $user->email;
            $record['role'] = 'subscriber';
            $record['password'] = '';
            $data = User::create($record);
        }

        \Auth::login($data);

        return redirect('/');
    }

    public function facebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallbackHandler()
    {
        $user = Socialite::driver('facebook')->user();

        $data = User::whereEmail($user->email)->first();

        if(!$data) {
            $record = [];
            $record['name'] = $user->name;
            $record['email'] = $user->email;
            $record['role'] = 'subscriber';
            $record['password'] = '';
            $data = User::create($record);
        }

        \Auth::login($data);

        return redirect('/');
    }
}
