<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Profile;
use App\Comments;
use App\Post;
use App\Hire;


class HomeController extends Controller
{
    //
    public function index()
    {
        if(auth()->check())
        {
            $profile = Profile::find(auth()->user()->id);
            if ($profile->status_update == '' || $profile->status_update == '0')
            {
                return redirect()->to('/employee/profile');
            }
            elseif($profile->status_update == '1')
            {
                if(auth()->user()->type == 'employee')
            {
                $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                $post = Post::all();

                $post_field_1 = Post::where(['job_field' => 'Computers and Technology'])->get();
                $post_field_2 = Post::where(['job_field' => 'Health Care and Allied Health'])->get();
                $post_field_3 = Post::where(['job_field' => 'Education and Social Services'])->get();
                $post_field_4 = Post::where(['job_field' => 'Arts and Communications'])->get();
                $post_field_5 = Post::where(['job_field' => 'Trades and Transportation'])->get();
                $post_field_6 = Post::where(['job_field' => 'Management, Business, and Finance'])->get();
                $post_field_7 = Post::where(['job_field' => 'Architecture and Civil Engineering'])->get();
                $post_field_8 = Post::where(['job_field' => 'Science'])->get();
                $post_field_9 = Post::where(['job_field' => ' Hospitality, Tourism, and the Service Industry'])->get();
                $post_field_10 = Post::where(['job_field' => 'Law and Law Enforcement'])->get();
            return view('home')->with(['notifcount' => $notifcount, 'post_field_1' => $post_field_1, 
                                                    'post_field_2' => $post_field_2,
                                                    'post_field_3' => $post_field_3,
                                                    'post_field_4' => $post_field_4,
                                                    'post_field_5' => $post_field_5,
                                                    'post_field_6' => $post_field_6,
                                                    'post_field_7' => $post_field_7,
                                                    'post_field_8' => $post_field_8,
                                                    'post_field_9' => $post_field_9,
                                                    'post_field_10' => $post_field_10,
                                                        'posts' => $post]);    
            }
            else{
                $comments = Comments::all();
                $hire = Hire::where(['company_id' => auth()->user()->id])->get();
               $post = Post::where(['company_id' => auth()->user()->id])->orderBy('id', 'desc')->get();
                $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
                return view('home')->with(['notifcount' => $notifcount, 'post' => $post, 'comments' => $comments, 'hires' => $hire]);  
            }
            }
            
        }
        else
        {

            $post_field_1 = Post::where(['job_field' => 'Computers and Technology'])->get();
            $post_field_2 = Post::where(['job_field' => 'Health Care and Allied Health'])->get();
            $post_field_3 = Post::where(['job_field' => 'Education and Social Services'])->get();
            $post_field_4 = Post::where(['job_field' => 'Arts and Communications'])->get();
            $post_field_5 = Post::where(['job_field' => 'Trades and Transportation'])->get();
            $post_field_6 = Post::where(['job_field' => 'Management, Business, and Finance'])->get();
            $post_field_7 = Post::where(['job_field' => 'Architecture and Civil Engineering'])->get();
            $post_field_8 = Post::where(['job_field' => 'Science'])->get();
            $post_field_9 = Post::where(['job_field' => 'Hospitality, Tourism, and the Service Industry'])->get();
            $post_field_10 = Post::where(['job_field' => 'Law and Law Enforcement'])->get();
            return view('home')->with(['post_field_1' => $post_field_1, 
            'post_field_2' => $post_field_2,
            'post_field_3' => $post_field_3,
            'post_field_4' => $post_field_4,
            'post_field_5' => $post_field_5,
            'post_field_6' => $post_field_6,
            'post_field_7' => $post_field_7,
            'post_field_8' => $post_field_8,
            'post_field_9' => $post_field_9,
            'post_field_10' => $post_field_10]); ;
        }
    }
}
