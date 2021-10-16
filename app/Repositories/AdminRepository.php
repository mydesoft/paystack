<?php

use App\Models\User;
use App\Models\Role;


namespace App\Repositories;

class AdminRepository
{
    // public function allUsers(){
    //     $role = Role::where('name', 'user')->first();
    //     return $role->users;
    // }

    // public function usersNumber(){
    //      $role = Role::where('name', 'user')->first();
    //      $role->users->count();

    // }

    public function activeUsers(){
        return User::where('status', 'Active')->count();
    }

    public function inActiveUsers(){
        return User::where('status', 'Inactive')->count();

    }

    public function admins(){
        $role = Role::where('name', 'admin')->first();
        if ($role->users->id !== Auth::id()) {
            return $role->users;
        }
        return $role->users;
    }
}
