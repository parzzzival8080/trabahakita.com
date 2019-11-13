@extends ('layouts.app')

@section ('content')

    <div class="container" style="margin-top:20px">
        <div class="container">
                <H1>Find Jobs Near you</H1>
        </div>
        <div class="container">
<div class="card">
    <div class="card-body">
        
                <div id="map" style="height: 70vh; width: auto">
                        <!-- Google Map Goes Here -->
                    </div>
        </div>
            
    </div>
</div>
        <div class="container" style="margin-top:10px;">
         <H2>On 5 kilometer Radius</H2>
                @if(count($locations) > 0 )
                @foreach($locations as $locate)
                @if(round($locate['distance']/1000, 1) < 5 )              
             
               
               
                        <div class="card" style="margin-top:20px;">
                                <div class="card-header">
                                        <h3>
                                                {{$locate['name']}}  
                                        </h3>
                                </div>
                                <div class="card-text">
                                    <div class="container">
                                            <h5>
                                                    Distance from you:({{ round($locate['distance']/1000, 1) }}Km)  
                                                    {{$locate['distance']}}
                                            </h5>
                                            <h5>
                                                {{$locate['adress']}}
                                                
                                            </h5>
                                            <h5>
                                                    <button class="btn btn-info"><a href="/profile/{{$locate['id']}}" style="color:white">Visit</a></button>
                                            </h5>
                                    </div>                                            
                                </div>
                            </div>
              
            @endif
                @endforeach
                @endif
        </div>
                       
                    
                  
                         
                   
            </div>
        </div>
        <script>
            function initMap()
            {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(
                        function (result) {
                            // IF GEOLOCATION IS SUCCESSFULL
        
                            // GOOGLE MAP
                            var map = new google.maps.Map(
                                document.getElementById('map'), {
                                    zoom: 16, // GOOGLE MAP ZOOM LEVEL
                                    scrollwheel: false,
                                    center: { // GOOGLE MAP CENTER 
                                        lat: {{ $user->lat }}, // GEOLOCATION RESULT LATITUDE
                                        lng: {{ $user->lng }}, // GEOLOCATION RESULT LONGITUDE
                                    }
                            })
                            // GOOGLE MAP MARKER
                            marker = new google.maps.Marker({
                                position: {
                                    lat: {{$user->lat}},
                                    lng: {{$user->lng}},
                                },
                                map: map,
                                icon: {                             
                                    url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"                   
                                },
                                draggable: false // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                            });
                            @foreach($locations as $a)
                            {
                               
                                    marker = new google.maps.Marker({
                                        position: {
                                            lat: {{$a['lat']}},
                                            lng: {{$a['lng']}},
                                        },
                                        map: map,
                                        label: '{{$a['name']}}',
                                        title: '{{$a['name']}}',
                                        draggable: false // GOOGLE MAP WHERE THE MARKER IS TO BE ADDED
                                        
                                    });
                                    
                                    // google.maps.event.addListener(marker, 'click', function() {window.location.href = 'http://www.facebook.com';});
                                    google.maps.event.addListener(marker, 'click', function() {
                                       
                                        window.open('/profile/{{$a['id']}}');
                                       
                                    
                                    });
                                    
                                    
                            }
                            @endforeach
                            
                        },
                        function (error) {
                            // IF GEOLOCATION IS UNSUCCESSFULL
                            alert("Ooops! Something went wrong.")
                        }
                    )
                } else {
                    alert("Ooops! Browser doesn't support Geolocation.")
                }
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwG2FvuLOl_rGjp4LHR6XSeLIG_ZjjJ0M&callback=initMap"></script>

        
@endsection