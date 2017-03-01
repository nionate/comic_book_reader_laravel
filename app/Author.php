<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    public function comics()
    {
        return $this->belongsToMany('App\comic', 'comic_author', 'id_autor', 'id_comic');
    }
}
