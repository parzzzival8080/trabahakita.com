@extends('layouts.app')
@section('content')
    
<div class="container" style="padding-top:20px">
        <h2>COMPANY PROFILES</h2>
        @if(count($profile) > 0)
        @foreach($profile as $profiles)
        @if($profiles->status_update == '1')
            <div class="card" style="margin-top:10px">
            <div class="card-header">
                    <h3>{{$profiles->company_name}}</h3>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <h5 class="text-muted" >
                                Address:{{$profiles->adress}}    
                        </h5 class="text-muted">
                        <h5 class="text-muted">
                                Email:{{$profiles->email}}
                        </h5 class="text-muted">
                       
                       <h5 class="text-muted">
                            Representative:{{$profiles->company_rep}}
                       </h5 class="text-muted">
                       <h5 class="text-muted">
                            Posts:
                            @if(count($post) > 0 )
                               @php
                                    $count = DB::table('posts')->where(['company_id' => $profiles->id])->get();
                                    echo $count->count();
                               @endphp
                                @endif
                       </h5 class="text-muted">
                       
                       
                       
                    </div>
                    <div class="card-footer">
                    <button class="btn btn-info"><a href="/company/profile/{{$profiles->id}}" style="color:white">Visit</a> </button>
                    </div>
                
                </div>
                
            </div>
            @endif
        @endforeach
        @endif

</div>



@endsection