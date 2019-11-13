@extends('layouts.app')
@section('content')
    {{-- <div class="card">
        <div class="card-body">
            <div class="card-text">

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div> --}}

     <h1>ADMIN</h1>
     <div class="row" >
            <div class="col-3" style="margin-top:5px;">
              <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
               
                        <a class="nav-link active pill-1"  id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Company Approval</a>
                
                        <a class="nav-link pill-2" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Seeker Approval</a>
                 
                        <a class="nav-link pill3" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Post Approval</a>
                
              </div>
            </div>
            <div class="col-9">
              <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        @if(count($profilec) > 0)
                        @foreach($profilec as $pro)
                        <div class="card" style="margin-top:5px">
                               <div class="card-body">
                                   <div class="card-title">
                                       Request Approval:{{$pro->company_name}}
                                   </div>
                                   <div class="card-text">
                                    
                                   </div>
                                   <div class="card-footer">
                                           <div class="row">
                                                   <div class="col">
                                                       <p>Status:Approved/Pending</p>
                                                   </div>
                                                   <div class="col">
                                                           <button class="btn btn-info">View Profile</button>
                                                   </div>
                                                   <div class="col">
                                                           <button class="btn btn-success">Approve</button>
                                                           <button class="btn btn-danger">Decline</button>
                                                   </div>
                                               </div>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                        @endif
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        @if(count($profilec) > 0)
                        @foreach($profilec as $pro)
                        <div class="card" style="margin-top:5px">
                               <div class="card-body">
                                   <div class="card-title">
                                       Request Approval:{{$pro->company_name}}
                                   </div>
                                   <div class="card-text">
                                    
                                   </div>
                                   <div class="card-footer">
                                           <div class="row">
                                                   <div class="col">
                                                       <p>Status:Approved/Pending</p>
                                                   </div>
                                                   <div class="col">
                                                           <button class="btn btn-info">View Profile</button>
                                                   </div>
                                                   <div class="col">
                                                           <button class="btn btn-success">Approve</button>
                                                           <button class="btn btn-danger">Decline</button>
                                                   </div>
                                               </div>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                        @endif
                </div>
                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        @if(count($profilec) > 0)
                        @foreach($profilec as $pro)
                        <div class="card" style="margin-top:5px">
                               <div class="card-body">
                                   <div class="card-title">
                                       Request Approval:{{$pro->company_name}}
                                   </div>
                                   <div class="card-text">
                                    
                                   </div>
                                   <div class="card-footer">
                                           <div class="row">
                                                   <div class="col">
                                                       <p>Status:Approved/Pending</p>
                                                   </div>
                                                   <div class="col">
                                                           <button class="btn btn-info">View Profile</button>
                                                   </div>
                                                   <div class="col">
                                                           <button class="btn btn-success">Approve</button>
                                                           <button class="btn btn-danger">Decline</button>
                                                   </div>
                                               </div>
                                   </div>
                               </div>
                           </div>
                        @endforeach
                        @endif
                </div>
              
              </div>
            </div>
          </div>
   
@endsection