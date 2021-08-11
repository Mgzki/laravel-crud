<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:3|max:255|unique:users,username',
            // 'username' => ['required, Rule::unique('users', 'username')],
            'email' => 'required|email|max:255|unique:users,email',
            'password' => ['required', 'min:6', 'max:255'], //diff way to write the same thing
            
        ]);
        
        $user = User::create($attributes); 

        Auth::login($user);

        return redirect('/')->withSuccess(' Your account has been created.');
    }
}
