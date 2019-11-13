<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Notification;
use App\Comments;
use App\Post;
use App\Hire;
use App\Profile;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('Appointment.appointmentset');
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
        //
        if (auth()->user()->type == 'company')
        {
            $appointment = new Appointment;
            $appointment->company_id = auth()->user()->id;
            $appointment->user_id = request('user_id');
            $appointment->company_name = auth()->user()->name;
            $appointment->user_name = request('user_name');
            $appointment->date = request('date');
            $appointment->time = request('time');
            $appointment->save();
    
            
            $notification = new Notification;
            $notification->company_id = auth()->user()->id;
            $notification->app_id = $appointment->id;
            $notification->user_id = request('user_id');
            $notification->subject = auth()->user()->name.' wants to hire you!';
            $notification->name = auth()->user()->name;
            $notification->message = request('message');
            $notification->from = 'company';
            $notification->message_type = '2';
            $notification->type = 'employee';
            $notification->save();
    
            return redirect()->to('/post');  
        }
        elseif (auth()->user()->type == 'employee')
        {
            

            $comments = Comments::find(request('comment_id'));
            $comments->hired_status = '2';
            $comments->save();

             
            $profile = Profile::find(auth()->user()->id);
            $profile->hire_status = '1';
            $profile->save();
    

            $post = Post::find(request('post_id'));
            $post->emp_hired = $post->emp_hired + 1;
            $post->save();

           if($post->emp_hired == $post->employee_num)
           {
               $post = Post::find(request('post_id'));
               $post->post_status = '1';
               $post->save();
           }
    

            $hire = New Hire;
            $hire->company_id = request('company_id');
            $hire->company_name = request('company_name');
            $hire->user_id = auth()->user()->id;
            $hire->post_id = request('post_id');
            $hire->user_name = auth()->user()->name;
            $hire->position = request('title');
            $hire->message_status = '0';
            $hire->save();


            $notification = new Notification;
            $notification->user_id = auth()->user()->id;
            $notification->company_id = request('company_id');
            $notification->app_id = request('comment_id');
            $notification->subject = 'Offer Accepted';
            $notification->type = 'company';
            $notification->message_type = '2';
            $notification->from = 'employee';
            $notification->name = auth()->user()->name;

            $notification->to = request('name');
            $notification->message = request('message');
            $notification->from = 'company';
            $notification->save();

          

            return redirect()->to('/Notification');  
        }
      
     }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

  
}
