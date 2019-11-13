<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Notification;

class FilterController extends Controller
{
    //
    public function cat()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Computers and Technology'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_1')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function health()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Health Care and Allied Health'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_2')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function education()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Education and Social Services'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_3')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function arts()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Arts and Communications'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_4')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function trade()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Trades and Transportation'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_5')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function management()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Management, Business, and Finance'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_6')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function arch()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Architecture and Civil Engineering'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_7')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function Science()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Science'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_8')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function tour()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Hospitality, Tourism, and the Service Industry'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_1')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }
    public function law()
    {
        if (auth()->check())
        {
            $post = Post::where(['job_field' => 'Law and Law Enforcement'])->orderBy('id', 'desc')->get();
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('Category.field_1')->with(['post' => $post, 'notifcount' => $notifcount]);
        }
        else
        {
            return redirect()->to('/login');
        }
    }

}
