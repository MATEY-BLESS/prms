<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Mail\NewAccountUserMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => 'nullable',
            'age' => 'nullable|integer',
            'region' => 'nullable|string',
            'locality' => 'nullable|string',
            'mobile' => 'nullable|string',
            'next_of_kin' => 'nullable|string',
            'emergency_contact' => 'nullable|string',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);



        if(request('image')){
            $filename = $request->image->getClientOriginalName();
            $input['image'] = request('image')->move('patients', $filename);
        }


        $user = User::create([
            'name' => $request->name,
            'slug' => Str::of($request['name'])->slug('-'),
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $patient = $user->patient()->create([
            'dob' => $request->dob,
            'age' => $request->age,
            'region' => $request->region,
            'locality' => $request->locality,
            'mobile' => $request->mobile,
            'next_of_kin' => $request->next_of_kin,
            'emergency_contact' => $request->emergenccy_contact,
        ]);

        if(request('image')){
            $patient = $user->patient()->create([
                'image' => $input['image'],
            ]);

        }


        // event(new Registered($user));

        // Auth::login($user);

        return redirect()->route('dashboard.patients.index');
        // return redirect(RouteServiceProvider::HOME);
        // return redirect()->route('verification.notice');
    }
}
