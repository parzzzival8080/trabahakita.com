<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\Education;
use App\Skills;

class SkillsController extends Controller
{
    //

    public function store(Request $request)
    {
        $this->validate(request(),
        [
           'skill' => 'required',
           
        ]);

        $skill = new Skills;
        $skill->user_id = auth()->user()->id;
        $skill->desc = request('skill'); 
        $skill->save();

        $profiles = Profile::find(auth()->user()->id);
        $education = Education::all();
        $skills = Skills::all();
        return redirect()->to('/employee/profile')->with(['profile' => $profiles, 'education' => $education, 'skills' => $skills]);
        
    }

    public function update(Request $request)
    {
        $this->validate(request(),
        [

           'skill' => 'required',
           
        ]);

        $skill = Skills::find(request('id'));
        $skill->user_id = auth()->user()->id;
        $skill->desc = request('skill'); 
        $skill->save();

        $profiles = Profile::find(auth()->user()->id);
        $education = Education::all();
        $skills = Skills::all();
        return redirect()->to('/employee/profile')->with(['profile' => $profiles, 'education' => $education, 'skills' => $skills]);
        
    }
}
