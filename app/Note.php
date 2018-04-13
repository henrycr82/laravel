<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Note extends Model
{
    /*Laravel sabe que cuando creo el modelo con el nombre "Note"
    la tabla que tiene que usar es la tabla "notes", esto lo sabe
    porque por convención de Laravel la versión snake_case y en plural
    el nombre del modelo sera usado como el nombre de la tabla, por ejemplo 
    como el modelo se llama "Note" este hace referencia por convencion de laravel a la tabla "notes"*/

    /*
		asi especifico el nombre de la tabla si no sigo la convencion de laravel
		protected $table = 'mis_motas';
    */

    //los campos que esten en la variable $fillable van a ser campos llenables
    //o campos que estaran en una lista blanca para ser llenados
    //masivamente (que esten por ejemplo en un arreglo con su respectivo valor  
    //asignado)
    protected $fillable = ['title','body','important', 'group_id'];

    //aqui es lo contrario al metodo anterior, de esta forma se colocan los 
    //campos que no pueden ser llenables
    //protected $guarded = ['id'];

    public function isImportant()
    {
    	return $this->important == 1;
    }

    public function group()
    {
        return $this->belongsto(Group::class);
        //en caso de que las tablas no las cree con las migraciones de laravel
        //sino que este conectandome a una bd ya existente
        //debo especificar el campo atraves del cual relaciono las tablas
        //ejemplo: si el campo se llama id_group la sentencia quedaria de esta forma
        //return $this->belongsto(Group::class,'id_group');

    }

    public function scopeWhithoutGroup($query)
    {
        //$query es el unico parametro que recibe la función scopeWhithoutGroup el cual es usado por el constructor de consultas de laravel para construir el query
        return $query->whereNull('group_id');
    }
}
