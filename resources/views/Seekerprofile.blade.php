@extends('layouts.app')
@section('content')

<div class="card">
        <div class="card-body">

                <div class="d-flex justify-content-center"> 
                        <img class="card-img-top" style="height:400px;width:300px; border-radius:50%;" src="{{ Storage::url($profile->image)  }}" alt="Card image cap">
                        </div>
                  
            <div class="card-title">
               <center>
                <h3>{{$profile->first_name}} {{$profile->last_name}}</h3>
               </center>
            </div>
            <div class="card-text">
                <center>
                <h5 class="card-subtitle mb-2 text-muted">{{$profile->title}}</h5>
                </center>
                <div class="container" style="margin-top:10px">
                        <div class="card">
                                <div class="card-header">
                                        <h3>Education</h3>
                                </div>
                                <div class="card-text">
                                    @if(count($education) > 0)
                                    @foreach($education as $edu)
                                    <div class="row">
                                        <div class="col">
                                            {{$edu->school}}
                                        </div>
                                        <div class="col">
                                            {{$edu->course}}
                                        </div>
                                        <div class="col">
                                            {{$edu->from}}-{{$edu->to}}
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>

                            </div>
                </div>

                <div class="container" style="margin-top:10px">
                        <div class="card">
                                <div class="card-header">
                                        <h3>Experience</h3>
                                </div>
                                <div class="card-text">
                                        @if(count($experience) > 0)
                                        @foreach($experience as $edu)
                                        <div class="row">
                                            <div class="col">
                                                {{$edu->school}}
                                            </div>
                                            <div class="col">
                                                {{$edu->course}}
                                            </div>
                                            <div class="col">
                                                {{$edu->from}}-{{$edu->to}}
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                </div>
                <div class="container" style="margin-top:10px">
                        <div class="card">
                                <div class="card-header">
                                        <h3>Skills</h3>
                                </div>
                                <div class="card-text">
                                        @if(count($skills) > 0)
                                        @foreach($skills as $edu)
                                        <div class="row">
                                            <div class="col">
                                                {{$edu->school}}
                                            </div>
                                            <div class="col">
                                                {{$edu->course}}
                                            </div>
                                            <div class="col">
                                                {{$edu->from}}-{{$edu->to}}
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                </div>
                            </div>
                </div>
              
                
            
           
            
            
            </div>
        </div>
    </div>
   
            <div class="card" style="margin-top:10px">
                <div class="card-header">
                    <h3>Summary</h3>
                    {{$profile->description}}
                </div>
            </div>
            



   
    @if(count($notification) > 0)
    @foreach($notification as $notif)
    @if($notif->type == 'employee')
    @if($notif->user_id == auth()->user()->id)
   
    @endif
    @endif
    @endforeach
    @endif
    
<div class="row" style="margin-top:20px;">
    <div class="col">
            <div class="card">
                    <div  class="card-header" style="background:#88AAFF; color:white">
                            <h1>Messages</h1>
                        </div>
                    <div class="card-body">
                        
                                <div class="card-text">
                                    <div class="row">
                                        <div class="col">
                                            Employer
                                        </div>  
                                        <div class="col">
                                            Message
                                        </div> 
                                        <div class="col">
                                            Date and Time
                                        </div>    
                                    </div> 
                                    
                                    @if(count($notification) > 0)
                                    @foreach($notification as $notif)
                                    <div class="row">       
                                            @if($notif->type == 'employee')
                                            @if($notif->user_id == auth()->user()->id)
                                        <div class="col" style="margin-top:5px">
                                        <h5>{{$notif->name}}</h5>
                                        </div>
                                        <div class="col" style="margin-top:5px">
                                        <h5><a href="/notification/show/{{$notif->id}}">{{$notif->subject}}</a></h5>
                                        </div>
                                        <div class="col" style="margin-top:5px">
                                                <p>{{$notif->created_at}}</p>
                                        </div>
                                        @endif
                                        @endif
                                      
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                    </div>
            </div>
    </div>
                
            
   
    <div class="col">
        <div class="card">
                <div class="card-header" style="background:#88AAFF; color:white">
                        <h1>Employment History</h1>
                        
                    </div>
            <div class="card-body">
               
                        @if(count($hire) > 0)
                        <div class="row">
                                <div class="col">
                                        Employer
                                    </div>
                                    <div class="col">
                                           Position
                                    </div>
                                    
                        </div>
                        @foreach($hire as $hires)
                        <div class="row" style="margin-top:5px">
                                <div class="col">
                                        {{$hires->company_name}}
                                    </div>
                                    <div class="col">
                                            {{$hires->position}}
                                    </div>
                                    
                        </div>
                      
                           
                        @endforeach
                        @endif
                </div>
               
            
        </div>
       
    </div>
    
</div>

@endsection