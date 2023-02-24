<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeEmailNotification;
use Illuminate\Support\Facades\Notification;

class MailController extends Controller
{
    public function sendNotification(Request $request){
        $request->validate( [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|same:password_confirmation',
            'password_confirmation' => 'required|min:6'
         ]);
        
         //$token = Str::random(64);
        //Store data in database
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //dd(gettype($user));
        
        $user->notify(new WelcomeEmailNotification($user));
        //dd('ff');
       
        return back()->with('success', 'Your form has been submitted please Check Your Mail');
       
    }

    
}
