<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Doctor;
class NotificationController extends Controller
{
    public function index(){
        $doctor = Auth::user();
        return view('notification.show')->with('doctor',$doctor);
    }
    public function markAsSeen($id){
    $markAsRead = Auth::user()->notifications()->findOrFail($id)->markAsRead();
    return back();
    }
}
