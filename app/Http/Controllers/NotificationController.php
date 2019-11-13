<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Appointment;
use App\Profile;
use App\Education;
use App\Skills;
use App\Experience;
use App\Hire;
use App;
use App\Comments;
use App\Post;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        if (auth()->check())
        {
            $profile = Profile::find(auth()->user()->id);
            if($profile->status_update == '' || $profile->status_update == '0')
            {
                return redirect()->to('employee/profile');
            }

            elseif($profile->status_update == '1')
            {
                if(auth()->user()->type == 'employee')
                {
                    $profile = Profile::find(auth()->user()->id);
                    $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                    $notification = Notification::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'desc')->get();
                    $education  = Education::where(['user_id' => auth()->user()->id])->get();
                    $Experience  = Experience::where(['user_id' => auth()->user()->id])->get();
                    $Skills  = Skills::where(['user_id' => auth()->user()->id])->get();
                    $comments = Comments::where(['user_id' => auth()->user()->id])->get();
                   $post = Post::all();
                    return view('notification.notification')->with(['post' => $post,'notification' => $notification, 'notifcount' => $notifcount, 'profile' => $profile, 'education' => $education, 'experience' => $Experience, 'skills' => $Skills,$notifcount, 'comments' => $comments]);    
                }
                else{
                    $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
                    $notification = Notification::all();
                    $comments = Comments::all();
                    $posts = Post::all();
                  
                    return view('notification.notification')->with(['notification' => $notification, 'notifcount' => $notifcount, 'comments' => $comments, 'post' => $posts]);  
                }
            }
        }
        
     
        
    }

    public function index2()
    {
        if (auth()->check())
        {
            $profile = Profile::find(auth()->user()->id);
            if($profile->status_update == '' || $profile->status_update == '0')
            {
                return redirect()->to('employee/profile');
            }

            elseif($profile->status_update == '1')
            {
                if(auth()->user()->type == 'employee')
                {
                    $profile = Profile::find(auth()->user()->id);
                    $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
                    $notification = Notification::where(['user_id' => auth()->user()->id])->orderBy('created_at', 'desc')->take(5)->get();
                    $education  = Education::where(['user_id' => auth()->user()->id])->get();
                    $Experience  = Experience::where(['user_id' => auth()->user()->id])->get();
                    $Skills  = Skills::where(['user_id' => auth()->user()->id])->get();
                    $hire = Hire::where(['user_id' => auth()->user()->id])->orderBy('created_at','desc')->get();
                    $posts = Post::all();
                    return view('seekerprofile')->with(['post' => $posts, 'notification' => $notification, 'hire' => $hire, 'notifcount' => $notifcount, 'profile' => $profile, 'education' => $education, 'experience' => $Experience, 'skills' => $Skills]);    
                }
                else{
                    $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
                    $notification = Notification::where(['company_id' => auth()->user()->id]);
                    $comments = Comments::all();
                    $post = Post::all();
                    return view('Notification.Notification')->with(['notification' => $notification, 'notifcount' => $notifcount, 'comments' => $comments, 'post' => $post]);  
                }
            }
        }
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
   

    public function show($id)
    {

        $notification = Notification::find($id);
        $appointment = Appointment::find($notification->app_id);
        $notification->message_status = '1';
        $notification->save();
          if(auth()->user()->type == 'employee')
        {
            $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);
            return view('notification.show')->with(['notification' => $notification, 'notifcount' => $notifcount, 'appointment' => $appointment]);    
        }
        else{
            $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
        return view('notification.show')->with(['notification' => $notification, 'notifcount' => $notifcount, 'appointment' => $appointment]);  
        }
       
    }

    public function pdf()
    {
        $appointment = Appointment::find(request('app_id'));
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadhtml(
            '<p>Dear '.$appointment->user_name.'</p><br>'.
            '<p>Thank you for applying for the position of'. $appointment->user_name .'in our company. '.
            'We would like to invite you for an interview in our office this coming '.$appointment->date.
            ' at '.$appointment->time.'.</p><br>'.
            '<p>Sincerely yours,</p>'.
            '<p>'.$appointment->user_name.'</p>'.
            '_____________________________'.
            '<p>'.$appointment->user_name.'</p>'.
            '<p>Contact Person</p>'.
            '<p>'.$appointment->company_name.'</p>'.
            '<p>address</p>'.
            '<p>number</p>'.
            '<p>email</p>'
        );
        return $pdf->stream();
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update()
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }

   
}
