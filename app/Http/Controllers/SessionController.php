<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
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
        return view('Register.login');
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

        
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }

        $profile = Profile::find(Auth::user()->id);
        if(Auth::user()->type == 'admin')
        {
            return redirect()->to('/admin/home');
        }
        elseif (Auth::user()->type == 'employee')
        {
            if($profile->status_update == '1')
            {
                return redirect()->to('/post');
            }
            elseif($profile->status_update == '0' || $profile->status_update == '')
            {
                return redirect()->to('/employee/profile');
            }
        }
        elseif(Auth::user()->type == 'company')
        {
            if($profile->status_update == '1')
            {
                return redirect()->to('/post');
            }
            elseif($profile->status_update == '0')
            {
                return redirect()->to('/employee/profile');
            }
        }
        
       
       
        
      

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
        auth()->logout();    
        return redirect()->to('/login');
    }
}
