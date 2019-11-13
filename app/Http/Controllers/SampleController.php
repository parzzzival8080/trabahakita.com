<?php

namespace App\Http\Controllers;

use App\Sample;
use App\User;
use App\Profile;
use App\Post;
use App\Notification;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->check())
        {
            if(auth()->user()->type == 'employee')
            {
                $post = Post::all();
                $notifcount = Notification::where(['user_id' => auth()->user()->id, 'type' => 'employee', 'message_status' => '0']);

                // maps
                $user_detail = Profile::where('id', auth()->user()->id)->select('lat', 'lng')->get();
                foreach($user_detail as $user)

                $company = Profile::where('type', '=', 'company')->get();
                    
                $locations = [];

                foreach($company as $comp)
                {
                    $info =  [
                        "id" => $comp->id,
                        "adress" => $comp->adress,
                        "distance" => $this->calculateDistance($user->lat, $comp->lat, $user->lng, $comp->lng),
                        "name" => $comp->company_name,
                        "lat" => $comp->lat,
                        "lng" => $comp->lng
                    ];
        
                    array_push($locations, $info);
                }

                for ($x = 0; $x < count($locations); $x++)
                {
                    for ($y = 0; $y < count($locations) - 1; $y++ )
                    {
                        if($locations[$y]['distance'] > $locations[$y+1]['distance'])
                        {
                            $temp = $locations[$y+1];
                            $locations[$y+1] = $locations[$y];
                            $locations[$y] = $temp;
                        }
                    }
                }
        
                $locations = collect($locations);
              $post = Post::all();
                return view('sample')->with(['notifcount' => $notifcount, 'locations' => $locations, 'user' => $user, 'post' => $post ]);   
            }
            elseif(auth()->user()->type == 'company')
            {
                $user_detail = Profile::where('id', auth()->user()->id)->select('lat', 'lng')->get();
                foreach($user_detail as $user)

                $company = Profile::where('type', '=', 'employee')->get();
                    
                $locations = [];

                foreach($company as $comp)
                {
                    $info =  [
                        "id" => $comp->id,
                        "adress" => $comp->adress,
                        "distance" => $this->calculateDistance($user->lat, $comp->lat, $user->lng, $comp->lng),
                        "name" => $comp->last_name.', '.$comp->first_name,
                        "lat" => $comp->lat,
                        "lng" => $comp->lng
                    ];
        
                    array_push($locations, $info);
                }

                for ($x = 0; $x < count($locations); $x++)
                {
                    for ($y = 0; $y < count($locations) - 1; $y++ )
                    {
                        if($locations[$y]['distance'] > $locations[$y+1]['distance'])
                        {
                            $temp = $locations[$y+1];
                            $locations[$y+1] = $locations[$y];
                            $locations[$y] = $temp;
                        }
                    }
                }
        
                $locations = collect($locations);
                $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
                return view('employeemap')->with(['notifcount' => $notifcount, 'locations' => $locations, 'user' => $user]); 
            }

            else{
                $post = Post::all();
                $notifcount = Notification::where(['company_id' => auth()->user()->id, 'type' => 'company', 'message_status' => '0']);
            return view('home')->with( ['notifcount' => $notifcount,'post' => $post]);  
            }
        }
        else
        {
            redirect()->to('/login');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sample $sample)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sample $sample)
    {
        //
    }

    private function calculateDistance($u_lat, $c_lat, $u_lng, $c_lng)
    {
        $R = 6371000; //Radius of the Earth

        $lat_1 = $u_lat * M_PI / 180; //User
        $lat_2 = $c_lat * M_PI / 180; //Mechanic

        $d_lat = ($u_lat - $c_lat) * M_PI / 180;
        $d_lng = ($u_lng - $c_lng) * M_PI / 180;

        $a = pow(sin($d_lat / 2), 2) + cos($u_lat) * cos($c_lat) * pow(sin($d_lng / 2), 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));

        return $R * $c; //Distance
    }
}
