@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top:10px">
        <h2>
                Posts related to "Arts and Communications"  

        </h2>
        
        @if(count($post) > 0)
        <button class="btn btn-danger"><a href="/home" style="color:white">Back</a></button>
        @foreach ($post as $posts)
        
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
           
            @endforeach
            @else
            <h2>Sorry, There are no related posts for Arts and Communications. <a href="/home">Go Back.</a></h2>
            @endif

    </div>
@endsection