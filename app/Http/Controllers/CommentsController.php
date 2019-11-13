<?php

namespace App\Http\Controllers;

use App\Comments;
use Illuminate\Http\Request;
use App\Post;
use App\Notification;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $comment = new Comments;
        $comment->post_id = request('post_id');
        $comment->company_id = request('company_id');
        $comment->user_id = auth()->user()->id;
        $comment->name = auth()->user()->name;
        $comment->message = request('message');
        $comment->contact_fb = request('fb');
        $comment->contact_twitter = request('viber');
        $comment->contact_email = request('email');
        $comment->save();

        $notification = New Notification;
        $notification->company_id = $comment->company_id;
        $notification->app_id = $comment->post_id;
        $notification->user_id = auth()->user()->id;
        $notification->name = auth()->user()->name;
        $notification->subject = auth()->user()->name.' sent you an application';
        $notification->message_type = '2';
        $notification->type = 'company';
        $notification->message = $comment->message;
        $notification->from =  'employee';
        $notification->to = request('company_name');
        $notification->save();

        $post = Post::find(request('post_id'));

        $comments = Comments::where(['user_id' => auth()->user()->id, 'post_id' => request('post_id')])->get();
       
        $notification = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0'])->get();
        return view('posts.show')->with(['post' => $post, 'comments' => $comments, 'notifcount' => $notification]);

        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function show(Comments $comments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function edit(Comments $comments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comments $comments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comments  $comments
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comments $comments)
    {
        //
    }
}
