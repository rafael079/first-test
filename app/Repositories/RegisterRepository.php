<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterRepository
{
    public function store(Request $request): User
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
    }
}