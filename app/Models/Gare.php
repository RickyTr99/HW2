<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gare extends Model {

    protected $table = 'gare';


    public function gare() {
        return $this->belongsTo("App\Models\Edizione_cds");
    }


    
}


?>