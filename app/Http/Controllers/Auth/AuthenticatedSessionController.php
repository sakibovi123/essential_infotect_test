<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
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
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        // if the user is admin no need to check for approved status

        if ( \auth()->user()->role == 'admin' ) {

            $request->session()->regenerate();

            return redirect()->intended(route('home', absolute: false));
        }

        // checking the status of user approved or pending

        if( !\auth()->user()->is_approved ){

            \auth()->logout();
//            dd("here");
            return redirect()
                ->back()
                ->with(['error' => 'Your account has not been approved yet. Please wait for admin approval.']);
        }

        $request->session()->regenerate();

        return redirect()->intended(route('home', absolute: false));
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
