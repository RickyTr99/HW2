<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

    protected $table = 'news';

    protected $primarykey='id';

    protected $fillable=[
        'titolo',
        'url',
        'descrizione'
    ];



    public function commenti() {
        return $this->HasMany("App\Models\Commenti");
    }

}


?>