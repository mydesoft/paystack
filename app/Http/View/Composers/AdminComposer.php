<?php

namespace App\Http\View\Composers;
use App\Repositories\AdminRepository;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Role;
use App\Models\Contact;
use Auth;


class AdminComposer
{
    
    public function compose(View $view){
        $users = $this->allUsers();
        $usersNumber =$this->usersNumber();
        $activeUsers = $this->activeUsers();
        $inActiveUsers = $this->inActiveUsers();
        $admins = $this->admins();
        $adminNumber = $this->adminNumber();
        $contactNumber = $this->contactNumber();
        $contacts = $this->contacts();
        $view->with(
            [
                'users' => $users,
                'userNumber' => $usersNumber,
                'activeUsers' => $activeUsers,
                'inActiveUsers' => $inActiveUsers,
                'admins' => $admins,
                'adminNumber' => $adminNumber,
                'contactNumber' => $contactNumber,
                'contacts' => $contacts,
            ]
        );

    }
    
     public function allUsers(){
        $role = Role::where('name', 'user')->first();
        return $role->users;
    }

    public function usersNumber(){
         $role = Role::where('name', 'user')->first();
         return $role->users->count();

    }

    public function activeUsers(){
         return User::where('status', 'Active')->count();
    }

    public function inActiveUsers(){
        return User::where('status', 'Inactive')->count();
    }

    public function admins(){
        $role = Role::where('name', 'admin')->first();
        return $role->users;   
    }

    public function adminNumber(){
        $role = Role::where('name', 'admin')->first();
        return $role->users->count();
    }

    public function contactNumber(){
        return Contact::count();
    }

    public function contacts(){
        return Contact::orderBy('created_at', 'desc')->get();
    }

}
