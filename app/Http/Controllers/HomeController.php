<?php

namespace App\Http\Controllers;

use App\Models\district;
use App\Models\division;
use App\Models\sub_district;
use App\Models\User_collection_Data;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        return view('frontend.index');
    }

    public function login(Request $request){
        $validate_data = $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
        $validate_data = $request->only('email', 'password');
        if (Auth::attempt($validate_data)) {
            // Authentication passed...
            return redirect()->route('user.dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function dashboard(){
        if(Auth::check()){
            $all_data = User_collection_Data::with('division_name','district_name','sub_district_name')->get();   
            return view('dashboard.dashboard',compact('all_data'));
          }
           return Redirect::to("home")->withSuccess('Opps! You do not have access');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect()->route('home');
    }
}
