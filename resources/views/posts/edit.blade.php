@extends('layouts.app')
@section('content')
<h2>CREATE YOUR POST</h2>
<div class="card">
    <div class="container" style="padding:20px;">
        
        <form method="POST" action="/post/update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label for="title" class="col-sm-3 col-form-label">Position</label>
                    <div class="col-sm-9">
                    <input type="text" name="post_id" id="post_id" value="{{$post->id}}">
                        <input name="title" type="text" class="form-control" id="title" placeholder="Position" value="{{$post->Title}}" required>
                    </div>
                </div>
                <div class="form-group row">
                        <label for="empid" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                                <select class="custom-select mr-sm-2" id="type" name="type" value="{{$post->job_type}}">
                                        <option   value="{{$post->job_type}}">{{$post->job_type
                                        }}</option>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Project">Project</option>
                                        <option value="Casual">Casual</option>
                                      </select>
                        </div>
                    </div>
                    <div class="form-group row">
                            <label for="empid" class="col-sm-3 col-form-label">Field</label>
                            <div class="col-sm-9">
                                    <select class="custom-select mr-sm-2" id="field" name="field" placeholder="Choose" value="{{$post->job_field}}" required>
                                        <option  selected value="{{$post->job_field}}" >{{$post->job_field}}</option>
                                            <option value="Computers and Technology">Computers and Technology</option>
                                            <option value="Health Care and Allied Health">Health Care and Allied Health</option>
                                            <option value="Education and Social Services">Education and Social Services</option>
                                            <option value="Arts and Communications">Arts and Communications</option>
                                            <option value="Trades and Transportation">Trades and Transportation</option>
                                            <option value="Management, Business, and Finance">Management, Business, and Finance</option>
                                            <option value="Architecture and Civil Engineering">Architecture and Civil Engineering</option>
                                            <option value="Science">Science</option>
                                            <option value="Hospitality, Tourism, and the Service Industry">Hospitality, Tourism, and the Service Industry</option>
                                            <option value="Law and Law Enforcement">Law and Law Enforcement</option>
                                          </select>
                            </div>
                        </div>
                    <div class="form-group row">
                            <label for="person" class="col-sm-3 col-form-label">Number of Person</label>
                            <div class="col-sm-9">
                                <input name="per_num" type="text" class="form-control" id="person"
                                       placeholder="Input Number" value="{{$post->employee_num}}" required>
                            </div>
                    </div>
               
                <div class="form-group row">
                        <label for="salary" class="col-sm-3 col-form-label">Salary</label>
                        <div class="col-sm-9">
                            <input name="salary" type="text" class="form-control" id="salary"
                                   placeholder="Tentative Salary" value="{{$post->salary}}" required>
                        </div>
                </div>
                <div class="form-group row">
                        <label for="desc" class="col-sm-3 col-form-label">DESCRIPTION</label>
                        <div class="col-sm-9">
                            <textarea name="description" type="text" class="form-control" id="desc" rows="5"
                                    >{{$post->description}}</textarea>
                        </div>
                </div>
                
                       
                <div class="form-group row">
                    <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Post Job</button>
                    </div>
                </div>
            </div>
            </form>

            
    </div>

@if(count($errors))
<div class="form-group">
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif   
@endsection
