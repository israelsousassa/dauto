<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\VehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Vehicle;
use App\Service;
use App\Activity;
use App\Part;
use App\Person;
use App\User;


class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => [
            'getVehicle',
            'upVehicle', 
            'update',
            'delVehicle',
            'registerVehicle',
            'addVehicle'
            ]
        ]);
    }

    public function getVehicle()
    {   
        $vehicle = Vehicle::where('person_users_id', Auth::user()->id)->get();

            if(view()->exists('vehicle.vehicle')){
                return view('vehicle.vehicle')->with('vehicle',$vehicle);
            }
    }
    
    public function upVehicle($id)
    {
        if(view()->exists('vehicle.update')) {
            return view('vehicle.update')->with('v', Vehicle::find($id))
                                         ->with('states', DB::table('states')->orderBy('abbr','asc')->get())
                                         ->with('manufacturers', DB::table('manufacturers')->get());
        }
    }

    public function update(UpdateVehicleRequest $request, $id)
    {      
        
        Vehicle::find($id)->fill($request->input())->save();

        return redirect()->action('VehicleController@getVehicle');
    }

    public function delVehicle($id)
    {   
        Part::where('service_vehicle_id', $id)->delete();
        Activity::where('service_vehicle_id', $id)->delete();
        Service::where('vehicle_id', $id)->delete();
        Vehicle::find($id)->delete();

        return redirect()->action('VehicleController@getVehicle');
    }

    public function registerVehicle()
    {   
        if(view()->exists('vehicle.register')){
            return view('vehicle.register')->with('states', DB::table('states')->orderBy('abbr','asc')->get())
                                           ->with('manufacturers', DB::table('manufacturers')->get());
        }
    }

    protected function addVehicle(VehicleRequest $request)
    { 
        $personid = Person::where('users_id', Auth::user()->id)->value('id');
        $req = $request->all();
        $req['person_id'] = $personid;
        $req['person_users_id'] = Auth::user()->id;
        Vehicle::create($req);
        
        return redirect()->action('VehicleController@getVehicle');
    }
}
