<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Profile;
use App\Comments;
use App\Notification;
use DB;

class PostController extends Controller
{

    function counted()
    {
        $notification = Notification::all();
        $num = 0;
        $num2 = 0;
        foreach ($notification as $notif)
        {
            if($notif->type == 'employee')
            {
                if($notif->user_id == auth()->user()->id)
                {
                   $num2 = $num + 1; 
                }
            }
          
        }
        return $num2;
    }
    //
    public function index()
    {
        if(auth()->check())
        {

            if (auth()->user()->type == 'employee')
            {
            $profile = Profile::find(auth()->user()->id);
            if ($profile->status_update == '1')
            {
                $post = Post::all();
                $notification = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee' ,'message_status' => '0'])->get();
                return view('posts.index')->with(['post' => $post, 'notifcount' => $notification]);
            }
            elseif ($profile->status_update == '0' || $profile->status_update == '')
            {
                return redirect()->to('/employee/profile');
            }
   
            }
            elseif (auth()->user()->type == 'company')
            {
                $post = Post::where(['company_id' => auth()->user()->id] )->get();
                $notification = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0'])->get();
                return view('posts.index')->with(['post_company' => $post, 'notifcount' => $notification]);
               
            }
        }
        else 
        {
            return redirect()->to('/login');
        }
      
    }
    public function create()
    {
        if(auth()->check())
        {
            if (auth()->user()->type == 'employee')
            {
                return redirect()->to('/employee/dashboard');
            }
            elseif (auth()->user()->type == 'company')
            {
                $notification = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0'])->get();
                return view('posts.create')->with('notifcount' , $notification);
            }
        }
       
    }

    public function store()
    {
        if (auth()->check())
        {
            if (auth()->user()->type == 'company')
            {
                $profile = Profile::find(auth()->user()->id);
                $posts = new Post;
                $posts->company_name = $profile->company_name;
                $posts->title = request('title');
                $posts->job_type = request('type');
                $posts->job_field = request('field');
                $posts->salary = request('salary');
                $posts->company_id = auth()->user()->id;
                $posts->employee_num = request('per_num');
                $posts->description = request('description');
                $posts->save();
                $post = Post::all();
                return redirect()->to('/post')->with('post', $post);
            }
            elseif (auth()->user()->type == 'employee')
            {
                return redirect()->to('/employee/dashboard');
            }
        }
      
    }

    public function show($id)
    {
        if(auth()->check())
        {
            if(auth()->user()->type == 'company')
            {
                $post=Post::find($id);
                $comments = Comments::all();
                $notification = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0'])->get();
                return view('posts.show')->with(['post' => $post, 'comments' => $comments, 'notifcount' => $notification]);
            }
            elseif(auth()->user()->type == 'employee')
            {
                $post=Post::find($id);
                $comments = Comments::where(['user_id' => auth()->user()->id, 'post_id' => $id])->get();
            
                $notification = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0'])->get();
                return view('posts.show')->with(['post' => $post, 'comments' => $comments, 'notifcount' => $notification]);

            }
           
        }
        else
        {
           return redirect()->to('/login');
        }
     
        
    }

    public function edit($id)
    {
        if(auth()->check())
        {
            if(auth()->user()->type == 'company')
            {
                $post=Post::find($id);
                $comments = Comments::all();
                $notification = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0'])->get();
                return view('posts.edit')->with(['post' => $post, 'notifcount' => $notification]);
            }
            elseif(auth()->user()->type == 'employee')
            {
              return redirect()->to('/home');
            }
          
           
        }
        else
        {
           return redirect()->to('/login');
        }
    }

    public function updateme()
    {
        $profile = Profile::find(auth()->user()->id);
        $posts = Post::find(request('post_id'));
        $posts->company_name = $profile->company_name;
        $posts->title = request('title');
        $posts->job_type = request('type');
        $posts->job_field = request('field');
        $posts->salary = request('salary');
        $posts->company_id = auth()->user()->id;
        $posts->employee_num = request('per_num');
        $posts->description = request('description');
        $posts->save();
        $post = Post::all();
        return redirect()->to('/post')->with('post', $post);
    }

    public function Activate()
    {
        $post = Post::find(request('id'));
        $post->post_status = '0';
        $post->save();

        return redirect()->to('/post');
    }

    public function Deactivate()
{
        $post = Post::find(request('id'));
        $post->post_status = '1';
        $post->save();

        return redirect()->to('/post');
    }
}
