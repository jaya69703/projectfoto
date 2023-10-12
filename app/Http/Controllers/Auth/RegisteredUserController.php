<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Auth Pages';
        $data['submenu'] = 'Register Page';
        return view('base.base-auth', $data);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $code = substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6); // Generate random 6-letter code

        $user = User::create([
            'code' => $code,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if(Auth::user()->type == 'Member'){
            return redirect()->intended(RouteServiceProvider::HOME_MEMBER)->with('success', 'Signed in successfully');
        } elseif (Auth::user()->type == 'Member Plus') {
            return redirect()->intended(RouteServiceProvider::HOME_MEMBERP)->with('success', 'Signed in successfully');
        } elseif (Auth::user()->type == 'Author') {
            return redirect()->intended(RouteServiceProvider::HOME_AUTHOR)->with('success', 'Signed in successfully');
        } elseif (Auth::user()->type == 'Admin') {
            return redirect()->intended(RouteServiceProvider::HOME_ADMIN)->with('success', 'Signed in successfully');
        }
    }
}
