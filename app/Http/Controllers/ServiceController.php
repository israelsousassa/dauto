<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Service;
use App\Person;
use App\Vehicle;
use App\Activity;
use App\Part;
use App\Http\Requests\ServiceRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PDF;


class ServiceController extends Controller
{   
    public function __construct()
    {
        $this->middleware('auth',['only' => [
            'registerService',
            'addService', 
            'getService',
            'getServiceVehicle'
            ]
        ]);
    }

    protected function registerService($id)
    {   
        if(View::exists('service.register')) {
            return view('service.register')->with('v', Vehicle::find($id)); 
        }
    }
    
    protected function addService(ServiceRequest $request, $id)
    {   
        # VALIDANDO ELEMENTOS DOS ARRAYS USANDO FUNÇÕES PHP
        for ($i=0; $i < count($request->activity); $i++) {
            if(is_null($request->activity[$i])){
             return redirect()->action('ServiceController@registerService', $id)
                              ->with('errorservice', 'O campo serviço não deve estar vazio.');
            }
            $activity[$i] = htmlspecialchars(stripcslashes(trim($request->activity[$i])));
            if(!preg_match("/^[0-9a-zA-ZÀ-Úà-ú. ]*$/", $activity[$i])){
                return redirect()->action('ServiceController@registerService', $id)
                                 ->with('errorservice', 'O campo serviço deve ser preenchido com caracteres alfanumericos.');
            }
            if(is_null($request->value[$i])){
             return redirect()->action('ServiceController@registerService', $id)
                              ->with('errorservice', 'O campo valor não deve estar vazio.');
            }
            $value[$i] = htmlspecialchars(stripcslashes(trim($request->value[$i])));
            if(!preg_match("/^[0-9.]*$/", $value[$i])){
                return redirect()->action('ServiceController@registerService', $id)
                                 ->with('errorservice', 'O campo valor deve ser preenchido com caracteres numericos.');
            }
        }
        for ($i=0; $i < count($request->part); $i++) { 
            $parts[$i] = htmlspecialchars(stripcslashes(trim($request->part[$i])));
            if(!preg_match("/^[0-9a-zA-ZÀ-Úà-ú.() ]*$/", $parts[$i])){
                return redirect()->action('ServiceController@registerService', $id)
                                 ->with('errorservice', 'O campo peça deve ser preenchido com caracteres alfanumericos.');
            }
            $refcode[$i] = htmlspecialchars(stripcslashes(trim($request->refcode[$i])));
            if(!preg_match("/^[0-9a-zA-ZÀ-Úà-ú ]*$/", $refcode[$i])){
                return redirect()->action('ServiceController@registerService', $id)
                                 ->with('errorservice', 'O campo código de referência deve ser preenchido com caracteres alfanumericos.');
            }
            $quantity[$i] = htmlspecialchars(stripcslashes(trim($request->quantity[$i])));
            if(!preg_match("/^[0-9]*$/", $quantity[$i])){
                return redirect()->action('ServiceController@registerService', $id)
                                 ->with('errorservice', 'O campo quantidade deve ser preenchido com caracteres numericos.');
            }
            $unitvalue[$i] = htmlspecialchars(stripcslashes(trim($request->unitvalue[$i])));
            if(!preg_match("/^[0-9.]*$/", $unitvalue[$i])){
                return redirect()->action('ServiceController@registerService', $id)
                                 ->with('errorservice', 'O campo valor unitário deve ser preenchido com caracteres numericos.');
            }
        }
        
        $userid = Auth::user()->id;
        $vehicle = Vehicle::find($id);
        
        $service = new Service();
        $service->serviceprovider = $request->serviceprovider;
        $service->entry = $request->entry;
        $service->departure = $request->departure;
        $service->diagnosis = $request->diagnosis;
        $service->description = $request->description;
        $service->km = $request->km;
        $service->vehicle_id = $vehicle->id;
        $service->vehicle_plate = $vehicle->plate;
        $service->vehicle_state = $vehicle->state;
        $service->vehicle_person_id = $vehicle->person_id;
        $service->vehicle_person_users_id = $vehicle->person_users_id;
        $service->save();

            $countactivity = count($activity);
            $activ = [];
            
            for ($y=0; $y < $countactivity; $y++) { 
                array_push($activ, $activity[$y]);
                $activity = new Activity();
                $activity->name = $activ[$y];
                $activity->value = $value[$y];
                $activity->service_id = $service->id;
                $activity->service_vehicle_id = $service->vehicle_id;
                $activity->service_vehicle_plate = $service->vehicle_plate;
                $activity->service_vehicle_state = $service->vehicle_state;
                $activity->service_vehicle_person_id = $service->vehicle_person_id;
                $activity->service_vehicle_person_users_id = $service->vehicle_person_users_id;
                $activity->save();
            }
            
            for ($i=0; $i < count($parts); $i++) { 
                    $part = new Part();
                    $part->name = $parts[$i];
                    $part->refcode = $refcode[$i];
                    $part->quantity = $quantity[$i];
                    $part->unitvalue = $unitvalue[$i];
                    $part->service_id = $service->id;
                    $part->service_vehicle_id = $service->vehicle_id;
                    $part->service_vehicle_plate = $service->vehicle_plate;
                    $part->service_vehicle_state = $service->vehicle_state;
                    $part->service_vehicle_person_id =  $service->vehicle_person_id;
                    $part->service_vehicle_person_users_id = $service->vehicle_person_users_id;
                    $part->save();
            }
        return redirect()->action('VehicleController@getVehicle');
    }

    public function getService($id)
    {   
        $vehicle = Vehicle::find($id);
        $msg = $vehicle->manufacturer . ' ' . $vehicle->model. ' ' . $vehicle->version . 
        ' não possui registro de serviços.';
        
        $service = Service::all();

        if(count($service) == 0){
            return redirect('veiculo')->with('msg', $msg);
        }else{
            for ($i=0; $i < count($service); $i++) { 
                if($service[$i]->vehicle_id != $id){
                    return redirect('veiculo')->with('msg', $msg);
                }else{
                    return view('service.view')->with('v', $vehicle)
                                                ->with('service', Service::where('vehicle_id', $id)->get());
                }
            }
        }
    }

    public function getServiceVehicle($id)
    {   
        $s = Service::find($id);
        $v = Vehicle::where('id',$s->vehicle_id)->get();
        $p = Person::where('users_id', Auth::user()->id)->get();
        $atv = Activity::where('service_id', $s->id)->get();
        #CONSULTA E MULTIPLICA DUAS COLUNAS
        $atotal = Activity::where('service_id',$s->id)->sum('value');
        
        $part = Part::where('service_id', $s->id)->select('name','refcode','quantity', 'unitvalue')
                                                 ->selectRaw('quantity * unitvalue as total')
                                                 ->get();
        #PEGA O OBJ, CODIFICA EM JSON, DEPOIS TRANSFORMA EM ARRAY 
        $pt = json_decode(json_encode($part));

        #SOMA COLUNA DE UM ARRAY
        $ptotal = array_sum(array_column($pt, 'total'));

        #FORMATANDO DATE E TIME
        $entrydate = date('d/m/Y', strtotime($s->entry));
        $entrytime = date('H:i', strtotime($s->entry));
        $departuredate = date('d/m/Y', strtotime($s->departure));
        $departuretime  = date('H:i', strtotime($s->departure));
        
        $pdf = PDF::loadView('service.viewservice', compact(
            's','v','p','atv','atotal','pt','ptotal','entrydate','entrytime','departuredate','departuretime'
        ));
            
        return  $pdf->stream();
    }
}
