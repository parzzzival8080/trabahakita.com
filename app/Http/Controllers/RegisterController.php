<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use DB;

class RegisterController extends Controller
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
        if (auth()->check())
        {
            return redirect()->to('/');
        }
        else
        {
            return view('Register.register');
        }
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
        $this->validate(request(),
        [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'type' => 'required',
            'lat' => 'nullable',
            'lng' => 'nullable'
        ]);

     

        $user = User::create(request(['name', 'email', 'password','type','skill','']));
       

        auth()->login($user);

       $profile = New Profile;
       $profile->id = $user->id;
       $profile->type = $user->type;
       $profile->lat = $request->lat;
       $profile->lng = $request->lng;
        $profile->save();
      
       if ($user->type == 'admin')
       {
        return redirect()->to('/');
       }
       elseif  ($user->type == 'employee' || $user->type == 'company')
       {
           $profile_view = Profile::find($user->id);
           return redirect()->to('/employee/profile');
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
    public function update()
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //


    }
}
