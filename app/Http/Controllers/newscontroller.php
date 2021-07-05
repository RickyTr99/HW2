<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\News;

class newscontroller extends Controller
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

    public function news() {

        $news = News::all();
        $array_news = array();
        foreach($news as $value) {

            $array_news[]= array('id'=>$value->id, 'titolo'=>$value->titolo, 'immagine'=>$value->url, 'descrizione'=>$value->descrizione);
        }
        return response()->json($array_news);

    }

    public function newsmodal($id) {

        $flag=0;

        $news = News::find($id);
       
            $array_news = array();
            if(isset($news)){
                $array_news[]= array('id'=>$news->id, 'titolo'=>$news->titolo, 'immagine'=>$news->url, 'descrizione'=>$news->descrizione);
            }
            else $array_news[]= array('error'=>true);

            return response()->json($array_news);
    }

    

    
}
?>