<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view ('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->intended('dashboard')->with('success', 'Votre inscription a été effectuée avec succès');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function profile(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255,name,'.$user->id,
            'email' => 'required|email|exists:users,email',
            'password' => 'string|max:255',
        ],[
            'name.required' => 'Veuillez renseigner un nom.',
            'login.required' => 'Veuillez renseigner un login.',
            'password.required' => 'Veuillez renseigner un mot de passe.'
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }

}
