<?php

use Illuminate\Routing\Controller;
use App\models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class registercontroller extends Controller{

    public function checkregister() {

        $request=request();
        if ($request->password==$request->password2){

            $utente = user::create(['Nome_Squadra'=>$request->username, 'Password'=>Hash::make($request->password)]);

            if ($utente){

                session::put('session_id', $utente->id);
                return redirect('home');
            }
            else {

                return redirect("registrer")
                ->with('old_Nome',$request->username);
            }

        }
        else {

            return redirect('register')->withinput();


        }
        
    }

    public function check () {

        $session_id=session('session_id');
        $user=user::find($session_id);

        if ( !isset($user) ) {

            return view('register');


        }
        else {

            return redirect('homelogin');
        }
    }



}



?>