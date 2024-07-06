<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class serviceController extends Controller
{
    public function index() {
        $email = User::where('role', 'user')->get();
        return view('admin.component.service',compact('email'));
    }
     function send(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to($request->email)->send(new ContactMail($details));

        return back()->with('success', 'Email sent successfully!');
    }
}
