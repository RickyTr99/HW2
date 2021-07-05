<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Edizione_cds extends Model {

    protected $table = 'edizione_cds';


    public function edizione_cds() {
        return $this->belongsTo("App\Models\Cds");
    }


    
}


?>