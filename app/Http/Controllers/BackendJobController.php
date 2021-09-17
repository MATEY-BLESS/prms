<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BackendJobController extends Controller
{
    public function pending(){
        $jobs = DB::table('jobs')->get();

        return view('dashboard.notifications.jobs.pending', compact('jobs'));
    }
}
