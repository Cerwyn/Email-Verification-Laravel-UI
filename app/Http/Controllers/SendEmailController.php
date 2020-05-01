<?php

namespace App\Http\Controllers;

use App\Mail\CustomHttpMail;
use Illuminate\Http\Request;
use App\Mail\CustomMarkdownMail;
use App\Notifications\CustomNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function sendHttp(Request $request)
    {
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        Mail::to($email)
            ->send(new CustomHttpMail($name));
        return redirect()->route('home');
    }

    public function sendMarkdown()
    {
        $email = Auth::user()->email;
        $name = Auth::user()->name;
        Mail::to($email)
            ->send(new CustomMarkdownMail($name));
        return redirect()->route('home');
    }

    public function sendNotification()
    {
        Auth::user()->notify(new CustomNotification(Auth::user()->name));
        return redirect()->route('home');
    }
}
