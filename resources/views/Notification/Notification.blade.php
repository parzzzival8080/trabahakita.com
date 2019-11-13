@extends('layouts.app')
@section('content')   
<div class="card" style="margin-top:20px;">
    <div class="card-header"><h2>Messages</h2></div>
    <div class="card-body">
        <div class="card-text">
            @if(auth()->user()->type == 'employee')
                <div class="row">
                        <div class="col-3">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-inbox" role="tab" aria-controls="v-pills-home" aria-selected="true">Inbox</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-sentbox" role="tab" aria-controls="v-pills-profile" aria-selected="false">Sentbox</a>
                            
                          </div>
                        </div>
                        <div class="col-9">
                          <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-inbox" role="tabpanel" aria-labelledby="v-pills-home-tab">
                              
                            @if(count($notification) > 0)
                            @foreach($notification as $notif)
                            @if($notif->type == 'employee')
                            @if($notif->from == 'company')

                            <div class="card" style="margin-top:10px">
                                <div class="card-header">FROM:{{$notif->name}}</div>
                                <div class="card-body">
                                <div class="card-title"> Subject: {{$notif->subject}}</div>
                                    <div class="card-text">
                                        {{$notif->message}}
                                    </div>
                                   <div class="card-footer">
                                        @if($notif->message_type == '0')
                                       
                                        <form action="/Appointment/hire" method="POST" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                          <input type="text " name="user_id" id="user_id" value="{{$notif->company_id}}" hidden>
                                          <input type="text " name="user_name" id="name" value="{{$notif->name}}" hidden>
                                          <input type="text " name="company_id" id="company_id" value="{{$notif->company_id}}" hidden>
                                          <input type="text " name="type" id="type" value="message" hidden>
                                        <input type="text " name="notif_id" id="notif_id" value="{{$notif->id}}" hidden>
                                      <input type="text " name="app_id" id="app_id" value="{{$notif->app_id}}" hidden>
                                     
                                          <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Your Message"></textarea>
                                        
                                          <button class="btn btn-warning" style="margin-top:10px" style="color:white">Reply</button> 
                                        </form>
                                      
                                        @elseif($notif->message_type == '1')
                                        
                                        <span class="badge badge-pill badge-warning">Replied</span>
                                        
                                        @elseif($notif->message_type == '2')
                                       

                                        @if(count($comments) > 0)
                                        @foreach($comments as $com)
                                        @if($com->company_id == $notif->company_id && $com->user_id == auth()->user()->id && $com->hired_status == '1' && $com->post_id == $notif->app_id)
                                        <form action="/setAppointment/accept" method="POST" enctype="multipart/form-data">
                                          {{ csrf_field() }}
                                          <input type="text " name="name" id="name" value="{{$notif->name}}" hidden>
                                          <input type="text " name="company_id" id="company_id" value="{{$com->company_id}}" hidden>
                                          <input type="text " name="comment_id" id="comment_id" value="{{$com->id}}" hidden>
                                          <input type="text " name="post_id" id="post_id" value="{{$com->post_id}}" hidden>
                                          @if(count($post) > 0)
                                          @foreach($post as $posts)
                                              @if($com->post_id == $posts->id)
                                              <input type="text " name="company_name" id="company_name" value="{{$posts->company_name}}" hidden>
                                              <input type="text " name="company_id" id="company_id" value="{{$posts->id}}" hidden>
                                              <input type="text " name="title" id="title" value="{{$posts->Title}}" hidden>
                                              @endif
                                          @endforeach
                                          @endif
                                          
                                          <textarea class="form-control" name="message" id="message" cols="30" rows="5" placeholder="Your Message"></textarea>
                                        
                                                  <button class="btn btn-success" style="margin-top:10px">Accept</button> 
                                         
                                          
                                          </form>
                                        
                                        @elseif($com->company_id == $notif->company_id && $com->user_id == auth()->user()->id && $com->post_id == $notif->app_id && $com->hired_status == '2')
                                        <button class="btn btn-success" disabled>Hired</button> 
                                        @endif
                                        @endforeach
                                        @endif
                                        
                                       @endif
                                      </div>
                                      
                                </div>
                            </div>
                           
                            @endif
                            @endif
                            @endforeach
                            @endif




                            </div>
                            <div class="tab-pane fade" id="v-pills-sentbox" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    @if(count($notification) > 0)
                                    @foreach($notification as $notif)
                                  
                                    @if($notif->type == 'company')
                                    @if($notif->from == 'employee')
                                        <div class="card" style="margin-top:10px">
                                        <div class="card-header">To:{{$notif->to}}</div>
                                        <div class="card-body">
                                            <div class="card-title"> Content:</div>
                                            <div class="card-text">
                                                {{$notif->message}}
                                            </div>
                                            <div class="card-footer">
                                                    <button class="btn btn-danger">Delete</button> 
                                            </div>
                                        </div>
                                        </div>
                                        @endif
                                        @endif
                                    @endforeach
                                @endif
    
                            </div>
                          
                          </div>
                        </div>
                      </div>
                      @elseif(auth()->user()->type == 'company')
                      <div class="row">
                            <div class="col-3">
                              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-inbox" role="tab" aria-controls="v-pills-home" aria-selected="true">Inbox</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-sentbox" role="tab" aria-controls="v-pills-profile" aria-selected="false">Sentbox</a>
                                
                              </div>
                            </div>
                            <div class="col-9">
                              <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-inbox" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    @if(count($notification) > 0)
                                    @foreach($notification as $notif)
                                    @if($notif->type == 'company')
                                    @if($notif->from == 'employee')
                                    @if($notif->company_id == auth()->user()->id && $notif->from = 'employee')

                                   
                                        <div class="card" style="margin-top:10px">
                                        <div class="card-header">FROM:{{$notif->name}}</div>
                                        <div class="card-body">
                                        <div class="card-title"> Subject: {{$notif->subject}}</div>
                                            <div class="card-text">
                                                {{$notif->message}}
                                            </div>
                                            <div class="card-footer">
                                                @if($notif->message_type == '0')
                                                @if($notif->message_status == '0')
                                                <form action="/Appointment/hire" method="POST" enctype="multipart/form-data">
                                                    {{ csrf_field() }}
                                                    <input type="text " name="type" id="type" value="message" hidden>
                                                    <input type="text " name="user_id" id="user_id" value="{{$notif->user_id}}" hidden>
                                                    <input type="text " name="user_name" id="name" value="{{$notif->name}}" hidden>
                                                    <input type="text " name="company_id" id="company_id" value="{{$notif->company_id}}" hidden>
                                                <input type="text " name="app_id" id="app_id" value="{{$notif->app_id}}" hidden>
                                                <input type="text " name="msg_type" id="msg_type" value="reply" hidden>
                                                <input type="text " name="notif_id" id="app_id" value="{{$notif->id}}" hidden>
                                                    <textarea class="form-control" name="message" id="msg" cols="30" rows="5" placeholder="Your Message"></textarea>
                                                  
                                                    <button type="submit" class="btn btn-warning" style="margin-top:10px" style="color:white">Reply</button> 
                                                  </form> 
                                                    @elseif($notif->message_status == '1')
                                                    <span class="badge badge-pill badge-success">Replied</span>
                                                   @endif
                                                  
                                                @elseif($notif->message_type == '2')
                                                @if(count($comments) > 0)
                                                @foreach($comments as $com)
                                                @if($com->company_id == $notif->company_id && $com->hired_status == '0' && $com->user_id == $notif->user_id && $com->post_id == $notif->app_id)
                                                <div class="row">
                                                    <div class="col-sm">
                                                        <form action="/post/pdf" method="POST" enctype="multipart/form-data">
                                                            {{ csrf_field() }}
                                                        <input type="text" name="id" value="{{$com->user_id}}" hidden>
                                                        <button class="btn btn-info"><a href="/profile/{{$com->user_id}}" style="color:white">View Profile</a></button>
                                                        <button type="submit" class="btn btn-secondary">Download Resume</button>
                                                       
                                                       
                                                    </form>
                                                       
                                                </div>
                                                <div class="col-sm">
                                                        <div class="d-flex justify-content-end">
                                                           
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#message{{$com->id}}" style="margin-right:5px">Message</button>
                                                    <button class="btn btn-success" data-toggle="modal" data-target="#hire{{$com->id}}">Hire</button>
                                                        </div>
                                                </div>
                                                </div>
                                                @elseif($com->post_id == $notif->app_id && $com->hired_status == '1' && $com->user_id == $notif->user_id)
                                                <button disabled="disabled" class="btn btn-info">Waiting for Confirmation</button>
                                                @elseif($com->post_id == $notif->app_id && $com->hired_status == '2' && $com->user_id == $notif->user_id)
                                                <button disabled="disabled" class="btn btn-success">Hired</button>
                                               
                                                @endif
                                                @endforeach
                                                @endif
                                             
                                                

                                                @endif
                                            </div>
                                        </div>
                                        </div>
                                       @endif
                                        @endif
                                        @endif
                                    @endforeach
                                @endif
    
                                </div>
                                <div class="tab-pane fade" id="v-pills-sentbox" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                        @if(count($notification) > 0)
                                        @foreach($notification as $notif)
                                      
                                        @if($notif->type == 'employee')
                                        @if($notif->from == 'company')
                                        @if($notif->company_id == auth()->user()->id)
                                            <div class="card" style="margin-top:10px">
                                            <div class="card-header">To:{{$notif->to}}</div>
                                            <div class="card-body">
                                                <div class="card-title"> Content:</div>
                                                <div class="card-text">
                                                    {{$notif->message}}
                                                </div>
                                                <div class="card-footer">
                                                        <button class="btn btn-danger">Delete</button> 
                                                </div>
                                            </div>
                                            </div>
                                            @endif
                                            @endif
                                            @endif
                                        @endforeach
                                    @endif
        
                                </div>
                              
                              </div>
                            </div>
                          </div>
                      @endif





@if(auth()->user()->type == 'company')
                    @if(count($post) > 0)
                      @foreach($post as $posts)
                    @if($posts->company_id == auth()->user()->id)
                    @foreach($comments as $com)
                    @if($com->post_id == $posts->id )
            <div class="modal fade" id="hire{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hire this Guy?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <h4>Hire {{$com->name}} for the position of {{$posts->Title}}?</h4>

                                      <form action="/Appointment/hire" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                              <div class="container">
                                                    <div class="form-group row">
                                                            <input type="text" name="comment_id" value="{{$com->id}}"  hidden>
                                                    <input type="text" name="user_id" value="{{$com->user_id}}" hidden>
                                                    <input type="text" name="user_name"  value="{{$com->name}}"  hidden>
                                                    <input type="text" name="post_id"  value="{{$posts->id}}"  hidden>
                                                    <input type="text" name="type"  value="hire"  hidden>
                                                </div>  
                                               
                                                    <div class="form-group row">
                                                        <label for="tyear">Message</label>
                                                        <textarea type="text" name="message" class="form-control" id="mesid" placeholder=" " rows="3" required></textarea>
                                                    </div> 
                                        </div>
                                       
                                      </div>
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                       
                                            <button type="submit" class="btn btn-primary">Hire</button>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                    @foreach($post as $posts)
                    @if($posts->company_id == auth()->user()->id)
                    @foreach($comments as $com)
                    @if($com->post_id == $posts->id )
            <div class="modal fade" id="message{{$com->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hire this Guy?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                      <h4>Hire {{$com->name}} for the position of {{$posts->Title}}?</h4>

                                      <form action="/Appointment/hire" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                              <div class="container">
                                                    <div class="form-group row">
                                                            <input type="text" name="comment_id" value="{{$com->id}}"  hidden>
                                                    <input type="text" name="user_id" value="{{$com->user_id}}"  hidden>
                                                    <input type="text" name="user_name"  value="{{$com->name}}"  hidden>
                                                    <input type="text" name="post_id"  value="{{$posts->id}}"  hidden>
                                                    <input type="text" name="type"  value="message"  hidden>
                                                </div>  
                                               
                                                    <div class="form-group row">
                                                        <label for="tyear">Message</label>
                                                        <textarea type="text" name="message" class="form-control" id="mesid" placeholder=" " rows="3" required></textarea>
                                                    </div> 
                                        </div>
                                       
                                      </div>
                                      <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                       
                                            <button type="submit" class="btn btn-primary">Hire</button>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    @endif
                    @endif
                     
        </div>
    </div>
</div>


   

   
@endsection