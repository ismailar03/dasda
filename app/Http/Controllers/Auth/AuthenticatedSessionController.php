<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    // Log the user out
    public function destroy(Request $request)
    {
        Auth::logout();

        // Optionally, invalidate the session
        $request->session()->invalidate();

        // Regenerate the session token to prevent session fixation attacks
        $request->session()->regenerateToken();

        // Redirect to the login page
        return redirect()->route('auth.login');
    }
}
