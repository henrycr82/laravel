<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    //siempre que queramos hacer una relación escribimos un metodo
    public function notes()
    {
    	return $this->hasMany(Note::class);
    }
}
