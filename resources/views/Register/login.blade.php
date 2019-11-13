@extends('layouts.app')
 
@section('content')
 
<div class="container" style="margin-top:50px">
    <div class="row">
        <div class="col">
                <div class="card" style="margin-top:90px;">
                        <div class="card-header" style="background:#455a64">
                            <center>
                                <h2 style="color:white; font-weight:300">Log In</h2>
                            </center>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                    <form method="POST" action="/login">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="email" style="font-size:1.5em;">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email">
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="password" style="font-size:1.5em;">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password">
                                        </div>
                                        <div class="form-group">
                                                <div class="d-flex justify-content-end">
                                            <button style="cursor:pointer" type="submit" class="btn btn-success">Login</button>
                                                </div>
                                        </div>
                                       
                                    </form>
                            </div>
                        </div>
                    </div>
        </div>
        <div class="col">
                <div class="align-self-center" style="margin-top:70px">
                <img style="margin-left:70px" src="{{ Storage::url('/images/landing.png')  }}" alt="landing_picture">
                </div>
        </div>
    </div>
      
</div>
  


    
               
               
        
 
@endsection