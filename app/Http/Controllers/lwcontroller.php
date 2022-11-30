<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\trip;
use Illuminate\Auth\Events\Registered;
use App\Http\Livewire;


class lwcontroller extends Controller
{
    // view functions 
    public function welcome(){return view('welcome');}
    public function login(){return view('pages.login');}
    public function register(){return view('pages.register');}
    public function private(){return view('pages.private');}
    public function test(){return view('pages.test');}
    public function addEntry(){return view('pages.add');}
    public function searchEntry(){return view('pages.search');}


    // register, log in and log out functions
    public function registerUser(Request $request){

        

        $request -> validate([
            'email'=>'required|unique:users,email',
            'name'=>'required',
            'password'=>'required'
        ]
        );

        $user = new User();

        $user->name = $request ->name;
        $user->email = $request ->email;
        $user->password = Hash::make($request->password);
        
        $user ->save();

        $userSave = $user -> save();

        event(new Registered($user));
        
        Auth::login($user);

        return redirect(route('privateSec'));

    }

    public function loginUser(Request $request){
                
        $credentials = [
            'email' => $request->email,
            'password'=> $request ->password
        ];

        $remember = ($request->has('remember')? true : false);


        if (Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            return redirect() ->intended(route('privateSec'));
        }
        
        else{
            
            return redirect(route('login'));
        }
    }

    public function logoutUser(Request $request){

        Auth::logout();
        $request -> session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));

    }

    // add information to database.
    public function addTrip(Request $request){

        $request -> validate([
            'from'=>'required|min:3',
            'to'=>'required|min:3',
            'value'=>'required|min:3|numeric',
            'payment'=>'required|min:3|numeric',
            'received'=>'required',
            'delivered'=>'required'
        ]
        );
        
        $trip = new trip();

        $trip->from = $request->from;
        $trip->to = $request->to;
        $trip->value = $request->value;
        $trip->payment = $request->payment;
        $trip->received = $request->received;
        $trip->delivered = $request->delivered;

        $trip -> save();
        $saveConfirmation = $trip->save();

        if($saveConfirmation){
            return back()->with('success', 'Data succesfully stored');
        }
        else{
            return back()->with('fail','Something went wrong');
        }

    }
}
