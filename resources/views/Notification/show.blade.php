@extends('layouts.app')
@section('content')

<div class="card">
    <div class="container" style="padding:10px;">
            <h3>FROM:{{$notification->name}}</h3>
            <h5>{{$notification->message}}</h5>
            
            @if(auth()->user()->type == 'employee')
            @if($appointment->appointment_status == '0')
            <form action="/setAppointment/accept" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <input type="text" name="notif_id" value="{{$notification->app_id}}" hidden>
            <input type="text" name="company_id" value="{{$notification->company_id}}" hidden>
            <button class="btn btn-primary">Accept</button>
            </form>
            @elseif($appointment->appointment_status == '1')
            <div class="row">
                <div class="col">
                <form action="/Download/pdf/application" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="text" name="app_id" value="{{$notification->app_id}}" hidden>
                    <button class="btn btn-info">Download Interview Form</button>
                </form>
               
                </div>
                <div class="col">
                        <form action="/setAppointment/accept" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <input type="text" name="notif_id" value="{{$notification->notif_id}}" hidden>
                        <input type="text" name="company_id" value="{{$notification->company_id}}" hidden>
                        <button class="btn btn-danger">Decline</button>
                        </form>
                    </div>
            </div>
            
            
            
            
            @endif
            @elseif(auth()->user()->type == 'company')
                <button class="btn btn-danger" ><a href="/Notification" style="color:white">Back</a></button>
            @endif   
    </div>
</div>

@endsection