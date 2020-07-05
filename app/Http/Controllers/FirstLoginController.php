<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use Hash;
class FirstLoginController extends Controller
{
    public function index($token){
       
         $doctor = Doctor::wheretoken($token)->first();
         
         return view('first_login')->with('doctor',$doctor);
    }
    public function storePassword(Request $request){
        $verifydata = $request->validate([
            'password' => 'required|string',
            'doctor_token' => 'required'
        ]);  
       
       $updatePassword = Doctor::where('token', $request->doctor_token)
                                ->update(['password' => Hash::make($request->password)]);
        return redirect("notifications");
    }
}
