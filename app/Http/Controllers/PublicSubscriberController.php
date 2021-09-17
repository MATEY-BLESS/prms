<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Events\NewSubscriberEvent;
use Illuminate\Http\Request;

// use App\Notifications\WelcomeSubscriber;
use Illuminate\Support\Facades\Mail;

class PublicSubscriberController extends Controller
{
    public function store(Request $request, Subscriber $subscriber)
    {
        // validate request later
        $input = $request->validate([
            'email' => 'required|string|email|max:255|unique:subscribers',
            'name' => 'string|nullable',
        ]);

        $subscriber->email = $input['email'];
        $subscriber->name = $input['name'];

        $subscriber->save();

        event(new NewSubscriberEvent($subscriber));
        return redirect()->back();
    }
}
