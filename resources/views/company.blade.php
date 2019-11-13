@extends('layouts.app')
@section('content')
<div class="container" style="margin-top:20px">
<h2>{{$profile->company_name}} Profile</h2>
</div>

<div class="container" style="margin-top:20px">
        <div class="card" >
                <div class="card-header">
                        <img class="card-img-top" src="{{ Storage::url($profile->image)  }}" alt="Card image cap">
                </div>
                <div class="card-body">
                        <div class="card-title">
                               
                            </div>
                            <div class="card-text">
                                    <H5> Location:{{$profile->company_rep}}</H5>
                                    <H5> Email:{{$profile->email}}</H5>
                                    <H5> Representative:{{$profile->company_rep}}</H5>
                            </div>
                </div>
               
                
            </div>
</div>
    <div class="container" style="margin-top:10px;">
            <h3>
                    Recent Posts
                    </h3>
            @if (count($post) > 0)
            @foreach ($post as $posts)
          @if($posts->company_id == $profile->id)
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
      @endif
        @endforeach
        @endif
    </div>
@endsection