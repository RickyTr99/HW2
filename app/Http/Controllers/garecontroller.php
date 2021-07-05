<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Gare;

class garecontroller extends Controller
{
    public function index() {
        $session_id = session('session_id');
        $user = User::find($session_id);
        if (!isset($user))
        { 
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        
        return view("gare")->with("user", $user);
    }

    public function gare() {

        $gare = Gare::all();
        $array_gare = array();
        foreach($gare as $value) {

            $array_gare[]= array('orario'=>$value->ORARIO, 'specialita'=>$value->SPECIALITA);
        }
        return response()->json($array_gare);

    }

}

?>