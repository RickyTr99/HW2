<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commenti extends Model {

    protected $table = 'commenti';


    public function news() {
        return $this->belongsTo("App\Models\News");
    }


    
}


?>