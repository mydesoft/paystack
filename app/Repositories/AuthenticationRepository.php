<?php

namespace App\Repositories;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthenticationRepository
{
    public function register(){

        $validated = $this->registerValidation();
        $password = $validated['password'];
        $validated['password'] = Hash::make($password);
        $user = User::create($validated);
        return $user; 
    }

    public function login(){
        $credentials = $this->loginValidation();
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return 'error';
        }

        else{
            if ($user->status === 'Inactive') {
                return 'Inactive';
            }
            else{

                return $user;  
            }
        }
    }

    public function logout(){
        Auth::logout();
    }

    public function registerValidation(){

        return request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required'
        ]);
    }

    public function loginValidation(){
        return request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]); 
    }
}
