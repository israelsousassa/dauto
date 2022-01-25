<?php

namespace App\Http\Controllers;
use App\Person;
use App\User;
use App\Http\Requests\PerfilRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only' => [
            'registerPerson', 
            'perfil',
            'updatePerfil'
            ]
        ]);
    }

    public function registerPerson()
    {
        if(view()->exists('person.register')) {
            return view('person.register');
            
        }
    }

    protected function Perfil()
    {   
       $person = Person::where('users_id', Auth::user()->id)->get();

        if(view()->exists('person.perfil')) {
            return view('person.perfil')->with('p',$person);
       }
    }

    protected function updatePerfil(PerfilRequest $request, $id)
    { 
            $user = User::find(Auth::user()->id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
            $person = Person::find($id);
            $person->lastname = $request->lastname;
            $person->datebirth = $request->datebirth;
            $person->cell = $request->cell;
            $person->save();

        return redirect()->action('VehicleController@getVehicle');
    }
}

