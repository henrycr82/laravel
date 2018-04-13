<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Note;
Use App\Group;

class NotesWithoutGroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        //$notes = Note::all();
        //$notes = Note::where('group_id','=',null)->get();//en el caso del where podemos obviar el segundo parametro siempre y cuando el operador logico que usemos sea el igual '='

        //otra forma para traerme las notas que no tienen grupo seria esta
        //whereNotNull() me trae todoas las que no son nulas
        //latest() ordena de mayor a menor
        //oldest() ordena de menor a mayor
        $notes = Note::WhithoutGroup()->get(); 
    
        return view('notes/index',compact('notes','groups'));
    }
}
