<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Profile;

class AdminController extends Controller
{
    //
    public function index()
    {
        $profilecompany = Profile::where(['type' => 'company'])->get();
        $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
        return view('Admin.admin')->with(['notifcount' => $notifcount, 'profilec' => $profilecompany]);
    }
}
