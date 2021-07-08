<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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

        User::create($attributes);

        return redirect('/')->withSuccess(' Your account has been created.');
    }
}
