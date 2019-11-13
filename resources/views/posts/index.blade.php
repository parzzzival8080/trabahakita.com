@extends('layouts.app')
@section('content')

        @if(auth()->user()->type == 'employee')
        @if (count($post) > 0)
        <div class="container" style="padding:30px">
                <h2>POSTS</h2>
                @foreach ($post as $posts)
                @if($posts->post_status == '0')
                            <div class="card" style="margin-top:10px">
                                    <div class="card-body">
                                      <div class="card-header">
                                            <h3>{{$posts->Title}}</h3>
                                            <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                                      </div>
                                       <div class="card-text" style="margin:10px">
                                        <h6 class="text-muted">Type:{{$posts->job_type}}</h6>
                                        <h6 class="text-muted">Field:{{$posts->job_field}}</h6>
                                        <h6 class="text-muted">Needed:{{$posts->employee_num}}</h6>
                                        <h6 class="text-muted">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                                        </div>
                                        <div class="card-footer">
                                                <h3>Description:</h3>
                                                <h6>
                                                    {{$posts->description}}
                                                </h6>
                                                <button class="btn btn-primary"><a href="/post/show/{{$posts->id}}" style="color:white">Check it Out</a></button>
                                        </div>
                                    </div>  
                                </div>
                @else
                @endif
                                @endforeach
        </div>
       
            
   
    @else
    <h1>there are no posts</h1>
    @endif
        @else
        <div class="container" style="padding-top:30px; padding-bottom:10px">
                <h2>Your Company's Post</h2>
        </div>
      
        @if (count($post_company) > 0)
       
        @foreach ($post_company as $posts)
        @if($posts->company_id == auth()->user()->id)
      
        <div class="card" style="margin-top:10px">
                <div class="card-body">
                  <div class="card-header">
                        <h3>{{$posts->Title}}</h3>
                        <h6 class="card-subtitle mb-2 text-muted"><a href="/company/profile/{{$posts->company_id}}" class="text-muted">{{$posts->company_name}}</a></h6>
                  </div>
                   <div class="card-text" style="margin:10px">
                    <h6 class="text-muted">Type:{{$posts->job_type}}</h6>
                    <h6 class="text-muted">Field:{{$posts->job_field}}</h6>
                    <h6 class="text-muted">Needed:{{$posts->employee_num}}</h6>
                    <h6 class="text-muted">Date Posted:{{$posts->created_at->toDateString()}}</h6>
                    </div>
                    <div class="card-footer">
                            <h3>Description:</h3>
                            <h6>
                                {{$posts->description}}
                            </h6>
                            <div class="row">
                                <div class="col">
                                        <button class="btn btn-info"><a href="/post/show/{{$posts->id}}" style="color:white">View</a></button>
                                        <button class="btn btn-warning"><a href="/post/show/{{$posts->id}}/edit" style="color:white">Edit</a></button>
                                </div>
                           
                            
                                <div class="col">
                                        @if($posts->post_status == '0')
                                        <form action="/post/deactivate" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="text" name="id" value="{{$posts->id}}" hidden>
                                        <button class="btn btn-danger">Deactivate</button>
                                        </form>
                                    
                                        @elseif($posts->post_status == '1')
                                        <form action="/post/activate" method="POST" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <input type="text" name="id" value="{{$posts->id}}" hidden>
                                        <button class="btn btn-success">Activate</button>
                                        </form>
                                        @endif
                                </div>
                            </div>
                          
                    </div>
                </div>  
            </div>
           
        
       
    @endif
    @endforeach
   @else
   <div class="container">
        <h4>You have no posts yet. Want to <a href="/post/create">create</a> one?</h4>
   </div>
  
    
   
    
    @endif
    @endif
    
     
   

@endsection
