<?php

use Illuminate\Routing\Controller;
use App\Models\User;


class podcastcontroller extends Controller {

    public function index() {
        $session_id = session('session_id');
        $user = User::find($session_id);
        if (!isset($user))
        { 
            $user=array("username"=> null);
            return view("home")->with("user", $user);
        }
        
        return view("podcast")->with("user", $user);
    }
    
    public function caricapodcast() {
        
        $token = Http::asForm()->withHeaders([
            'Authorization' => 'Basic '.base64_encode(env('SPOTIFY_CLIENT_ID').':'.env('SPOTIFY_CLIENT_SECRET')),
        ])->post('https://accounts.spotify.com/api/token', [
            'grant_type' => 'client_credentials',
        ]);
        if ($token->failed()) abort(500);

        $response = Http::withHeaders([
            'Authorization' => 'Bearer '.$token['access_token']
        ])->get('https://api.spotify.com/v1/search', [
            'type' => 'episode',
            'q' => 'correre per sempre podcast',
            'limit' => '9',
            'offset' => '0',
            'market' => 'IT'
        ]);
        if($response->failed()) abort(500);

        return $response->body();    
    }
}
?>
