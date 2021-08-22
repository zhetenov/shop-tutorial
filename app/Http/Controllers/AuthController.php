<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('login');
    }

    public function registerPage()
    {
        $cities = City::orderBy('title')->get();

        return view('register', compact('cities'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('loginPage');
    }

    public function registerPost(RegisterRequest $request)
    {
        User::create($request->validated());

        return redirect()->route('loginPage');
    }

    public function loginPost(LoginPostRequest $request)
    {
        $user = User::where('email', $request->get('email'))
            ->where('password', $request->get('password'))
            ->first();

        if (!$user) {
            return redirect()->route('loginPage')->withErrors(['Нету такого пользователя']);
        }

        Auth::login($user);

        return redirect()->route('welcome');
    }
}
