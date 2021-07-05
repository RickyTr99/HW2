<?php

use Illuminate\Routing\Controller;
use App\models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class logincontroller extends Controller{

    public function login () {

        if ( session ('session_id') != null) {

            return redirect('home');


        }
        else {

            return view('login')->with ('csrftoken', csrf_token());
        }
    }

    public function checklogin () {

        $utente = user:: where ('Nome_Squadra', request('username'))->first();
        
        if (isset($utente)){

            if (hash::check(request('password'), $utente->Password)) {

                session::put('session_id', $utente->id);
                return redirect('home');


            }
            else return redirect('login')->withinput();


        }
    }

    public function logout () {

        session::flush();
        return redirect('home');
    }
}




?>