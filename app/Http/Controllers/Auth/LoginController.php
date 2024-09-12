<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard')->with('success', 'Vous êtes connecté');
        }
 
        return back()->withErrors([
            'email' => 'L\'adresse mail que vous avez fournie n\'est pas la bonne.',
            'password' => "Votre mot de passe est incorrect"
        ])->onlyInput('email')
        ->onlyInput('password');
    }

    public function logout(Request $request)
    {
        // Déconnexion de l'utilisateur
        Auth::logout();

        // Effacement des sessions
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirection vers la page de connexion
        return redirect('/');
    }

}
