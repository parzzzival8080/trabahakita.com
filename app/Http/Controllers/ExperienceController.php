<?php

namespace App\Http\Controllers;

use App\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
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
        //
        $experience = new Experience;
        $experience->user_id = auth()->user()->id;
        $experience->workplace = request('work');
        $experience->from = request('from');
        $experience->to = request('to');
        $experience->desc_1 = request('desc_1');
        $experience->desc_2 = request('desc_2');
        $experience->desc_3 = request('desc_3');
        $experience->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function show(Experience $experience)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function edit(Experience $experience)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Experience $experience)
    {
        //

        $experience = Experience::find(request('id'));
        $experience->user_id = auth()->user()->id;
        $experience->workplace = request('work');
        $experience->from = request('from');
        $experience->to = request('to');
        $experience->desc_1 = request('desc_1');
        $experience->desc_2 = request('desc_2');
        $experience->desc_3 = request('desc_3');
        $experience->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Experience  $experience
     * @return \Illuminate\Http\Response
     */
    public function destroy(Experience $experience)
    {
        //
    }
}
