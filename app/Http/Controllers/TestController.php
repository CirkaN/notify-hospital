<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SetupPasswordMail;
use App\Notifications\NewNotification;
use App\Doctor;
use Spatie\Permission\Models\Role;
use App\Notification;
class TestController extends Controller
{
    public function email(){
      
      return Notification::all();

    
    }
}
