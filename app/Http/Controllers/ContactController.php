<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contact(){
        return view('contact');
    }
    public function contactAction(){
        $validated = $this->validateContactRequest();
        Contact::create($validated);
        return back()->with('success', 'Your message has been sent. Thanks for getting in touch.');
    }

    public function validateContactRequest(){
        return request()->validate([
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required|max:255'
        ]);
    }
}
