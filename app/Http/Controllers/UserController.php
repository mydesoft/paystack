<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class UserController extends Controller
{
    public function dashboard(){
        return view('user.dashboard');
    }

    public function workshops(){
        $workshops = Workshop::orderBy('created_at', 'asc')->get();
        return view('user.workshops', compact('workshops'));
    }

    public function showWorkshop($id){
        $workshop = Workshop::find($id);
        $times = unserialize($workshop->time);
        return view('user.show-workshop')->with(['workshop' => $workshop, 'times' => $times]);
    }
}
