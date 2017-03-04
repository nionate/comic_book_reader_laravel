<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{

    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'comic_genre', 'id_comic', 'id_genero');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author', 'comic_author', 'id_comic', 'id_autor');
    }

    public function editorial()
    {
        return $this->belongsTo('App\Editorial', 'id_editorial');
    }

    public function comentarios()
    {
        return $this->hasMany('App\Comment', 'id_comic');
    }
}
