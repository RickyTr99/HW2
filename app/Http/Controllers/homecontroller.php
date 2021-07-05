<?php

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\Models\User;
use App\Models\Gallery;

class homecontroller extends Controller
{
    public function index() {
        $session_id = session('session_id');
        $user = User::find($session_id);
        if (!isset($user))
        { 
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        
        return view("homelogin")->with("user", $user);
    }

}

?>