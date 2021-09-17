<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;

class BackendSubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::all();
        return view('dashboard.subscribers.index', compact('subscribers'));
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();
        return redirect()->back();
    }
}
