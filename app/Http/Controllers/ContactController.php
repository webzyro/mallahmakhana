<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        return view('front.contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:3',
            'email' => 'email|string|required',
            'phone' => 'string|required|min:10',
            'message' => 'string|required|min:20'
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Message sent successfully!');
    }
}
