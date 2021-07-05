<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Commenti;

class commenticontroller extends Controller
{
    public function index() {
        $session_id = session('session_id');
        $user = User::find($session_id);
        if (!isset($user))
        { 
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        
        return view("news")->with("user", $user);
    }

    public function commenti() {

        $commenti = Commenti::join('squadra', 'squadra.id', '=', 'commenti.squadra')->orderBy('commenti.id')->get();
        $array_commenti = array();
        foreach($commenti as $value) {

            $array_commenti[]= array('id'=>$value->id, 'cod_news'=>$value->cod_news, 'commento'=>$value->commento, 'squadra'=>$value->squadra, 'Nome_Squadra'=>$value->Nome_Squadra);
        }
        return response()->json($array_commenti);

    }

    public function aggiungicommenti($commento, $id) {

        $session_id = session('session_id');
        $commenti = Commenti::insert(array('cod_news'=>$id, 'commento'=>$commento, 'squadra'=>$session_id));
        $squadra = User::find($session_id);
        $nome_squadra[]= array('username'=>$squadra->Nome_Squadra);
        return response()->json($nome_squadra);

    }


}

?>