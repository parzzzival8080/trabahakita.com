<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Education;
use App\Profile;
use App\Skills;

class EducationController extends Controller
{
    //
    public function store(Request $request)
    {
        $this->validate(request(),
        [
           'school' => 'required',
            'degree' => 'required',
            'from-year' => 'required',
            'to-year' => 'required',
        ]);

        $education = new Education;
        $education->user_id = auth()->user()->id;
        $education->school = request('school');
        $education->from = request('from-year');
        $education->to = request('to-year');
        $education->course = request('degree');
        $education->save();

        $profiles = Profile::find(auth()->user()->id);
        $education = Education::all();
        $skills = Skills::all();
        return redirect()->to('/employee/profile')->with(['profile' => $profiles, 'education' => $education, 'skills' => $skills]);
    }

    public function updateme(Request $request)
    {
        $this->validate(request(),
        [
           'school' => 'required',
            'degree' => 'required',
            'from-year' => 'required',
            'to-year' => 'required',
        ]);

        $education = Education::find(request('id'));
        $education->user_id = auth()->user()->id;
        $education->school = request('school');
        $education->from = request('from-year');
        $education->to = request('to-year');
        $education->course = request('degree');
        $education->save();

        $profiles = Profile::find(auth()->user()->id);
        $education = Education::all();
        $skills = Skills::all();
        return redirect()->to('/employee/profile')->with(['profile' => $profiles, 'education' => $education, 'skills' => $skills]);
    }
}
