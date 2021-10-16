<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Events\AdminCreatedEvent;
use App\Models\Contact; 

class AdminController extends Controller
{
    
    public function dashboard(){
        return view('admin.dashboard');
    }
    
    public function registeredUsers(){
        return view('admin.registered-users');
    }

    public function admins(){
        return view('admin.view-admin');
    }

    public function activate($id){
        User::find($id)->update(['status' => 'Active']);
        return redirect()->back()->with('success', 'User has been Activated!');
    }

    public function deActivate($id){
        User::find($id)->update(['status' => 'Inactive']);
        return redirect()->back()->with('success', 'User has been Deactivated!');  
    }

    public function delete($id){
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User has been Deleted!');  

    }

    public function addAdmin(){
        $validated = request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'username' => 'required',
            'password_confirmation' => 'required'
        ]);

        $validated['status'] = 'Admin';
        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        event(new AdminCreatedEvent($user));
        return back()->with('success', 'Admin Created!');
    }

    public function deleteAdmin($id){
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Admin has been Deleted!');  

    }

    public function readMessages(){
        $readMessages = Contact::onlyTrashed()->get();
        return view('admin.read-messages', compact('readMessages'));
    }

    public function unreadMessages(){
        return view('admin.unread-messages');
    }

    public function markAsRead($id){
        Contact::find($id)->delete();
        return back()->with('success', 'Message has been read');
    }

    public function deleteMessage($id){
        $contact = Contact::withTrashed()->find($id)->forceDelete();
        return back()->with('success', 'Message has been deleted');
    }

}
