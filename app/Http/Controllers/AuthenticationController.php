<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Repositories\AuthenticationRepository;
use App\Events\RegisteredUserEvent;
use Auth;

class AuthenticationController extends Controller
{
    public function __construct(AuthenticationRepository $authenticateRepository){

        $this->authenticateRepository = $authenticateRepository;

    }

    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function registerUser(){
        $user = $this->authenticateRepository->register();
        event(new RegisteredUserEvent($user));
        return redirect()->route('confirmation')->with(['success' => 'Registration Successful!', 'user' => $user->name]);                                           
    }

    public function confirmation(){
        if(!session('success')){
            return back();
        }
        return view('registration-confirmation');

    }

    public function loginUser(){
        $credentials = $this->authenticateRepository->login();
        if ($credentials === 'error') {
            return back()->with('error', 'Bad Credentials');
        }
        elseif ($credentials === 'Inactive') {
            return back()->with('error', 'Your Account has not been activated');
        }
        Auth::login($credentials);
        $role = Auth::user()->hasRole();
        if ($role === 'admin') {
            return redirect()->route('admin-dashboard');   
        }
        else{
            return redirect()->route('user-dashboard');
        }
    }

    public function logout(){
        $this->authenticateRepository->logout();
        return redirect()->route('login');

    }

}
