<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $data['title'] = 'Skydash';
        $data['menu'] = 'Auth Pages';
        $data['submenu'] = 'Login Page';
        return view('base.base-auth', $data);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::user()->type == 'User'){
            return redirect()->intended(RouteServiceProvider::USERHOME)->with('success', 'Signed in successfully');
        } elseif (Auth::user()->type == 'Worker') {
            return redirect()->intended(RouteServiceProvider::WORKHOME)->with('success', 'Signed in successfully');
        } elseif (Auth::user()->type == 'Admin') {
            return redirect()->intended(RouteServiceProvider::ADMINHOME)->with('success', 'Signed in successfully');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
