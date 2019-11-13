@extends('layouts.app')
 
@section('content')
 
  


    <style>
        section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #e8505b;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{

    color: black;
}
#tabs h6.section-title{
    color: black;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #e8505b;
    background-color: transparent;
    border-color: transparent transparent #e8505b;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #e8505b;
    font-size: 20px;
}
        </style>

<div class="container">
        <div class="row">
                <div class="col">      
                        <div class="align-self-center" style="margin-top:200px">
                                <img style="margin-left:70px" src="{{ Storage::url('/images/landing.png')  }}" alt="landing_picture">
                                </div>         
                        <h1  style="font-weight:300; color:grey">We give you a Free Job Fair, Everyday!</h1>           
                </div>
                <div class="col">
                           
                        <section id="tabs">

                                <div class="container">
                                    <h6 class="section-title h1" style="font-weight:300; color:#e8505b">Register</h6>
                                    <div class="row">
                                        <div class="col-xs-12 ">
                                            <nav>
                                                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">I want to Hire</a>
                                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">I want to Work</a>
                                                   
                                                </div>
                                            </nav>
                                            <div class="tab-content" id="nav-tabContent">
                                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                                    <div class="card">
                                                        <div class="card-header" >
                                                            <center>
                                                        <h5 style="font-weight:400;color:#455a64">Register as an Employer</h5>
                                                            </center>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                    <form method="POST" action="/register">
                                                                        {{ csrf_field() }}
                                                                        
                                                                 
                                                                        <div class="form-group">
                                                                            <label for="email">Email:</label>
                                                                            <input type="email" class="form-control" id="email" name="email">
                                                                        </div>
                                                                 
                                                                        <div class="form-group">
                                                                            <label for="password">Password:</label>
                                                                            <input type="password" class="form-control" id="password" name="password">
                                                                        </div>
                                                                
                                                                        <div class="form-group">
                                                                            <label for="password_confirmation">Password Confirmation:</label>
                                                                            <input type="password" class="form-control" id="password_confirmation"
                                                                                   name="password_confirmation">
                                                                        </div>
                                                                
                                                                        <input type="text" class="form-control" id="type" name="type" value="company" hidden>      
                                                                            </div>
                                                                            
                                                                 
                                                                        <div class="form-group">
                                                                            <button style="cursor:pointer" type="submit" class="btn btn-success" >Register</button>
                                                                        </div>
                                                                       
                                                                    </form>
                                                                   
                                                            </div>
                                                        </div>
                                                        <p style="color:white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor modi provident soluta placeat libero sunt culpa natus maxime impedit voluptatem, voluptatibus officia. Nesciunt delectus totam, non tempore harum at excepturi?</p>
                                                       
                                                    </div>
                                                
                                                        
                                               
                                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                        <div class="card">
                                                                <div class="card-header">
                                                                    <center>
                                                                <h5 style="font-weight:400;color:#455a64">Register as Job Seeker</h5>
                                                                    </center>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="card-text">
                                                                            <form method="POST" action="/register">
                                                                                {{ csrf_field() }}
                                                                                
                                                                         
                                                                                <div class="form-group">
                                                                                    <label for="email">Email:</label>
                                                                                    <input type="email" class="form-control" id="email" name="email">
                                                                                </div>
                                                                         
                                                                                <div class="form-group">
                                                                                    <label for="password">Password:</label>
                                                                                    <input type="password" class="form-control" id="password" name="password">
                                                                                </div>
                                                                        
                                                                                <div class="form-group">
                                                                                    <label for="password_confirmation">Password Confirmation:</label>
                                                                                    <input type="password" class="form-control" id="password_confirmation"
                                                                                           name="password_confirmation">
                                                                                </div>
                                                                        
                                                                                <input type="text" class="form-control" id="type" name="type" value="employee" hidden>      
                                                                                    </div>
                                                                                    
                                                                         
                                                                                <div class="form-group">
                                                                                    <button style="cursor:pointer" type="submit" class="btn btn-success">Register</button>
                                                                                </div>
                                                                               
                                                                            </form>
                                                                    </div>
                                                                </div>
                                                                <p style="color:white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dolor modi provident soluta placeat libero sunt culpa natus maxime impedit voluptatem, voluptatibus officia. Nesciunt delectus totam, non tempore harum at excepturi?</p>
                                                       
                                                            </div>
                                                </div>
                                            </div>
                                                
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </section>
                </div>
            </div>
</div>

           
                   
                        
   
           
    

 
@endsection