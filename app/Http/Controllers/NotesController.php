<?php

namespace App\Http\Controllers;
Use App\Note;
Use App\Group;
use Illuminate\Http\Request;
Use App\Http\Requests\NotesRequest;

class NotesController extends Controller
{
    //
    public function index(Group $group)
    {
        $groups = Group::all();
        //$notes = Note::all(); //todas la notas
        $notes = $group->notes;//notas que pertenecen a un grupo
    	//return view('notes/index', ['notes'=>$notes]);
        return view('notes/index',compact('notes','groups'));
    }

    //public function show($id)
    //Vamos a usar el route model binding para en vez de pasar un parametro
    //pasar la nota comtal tal (la instancia del modelo ya construido).
    //para recibir la nota (note) debemos decirle a laravel que tipo de variable 
    //vamos a recibir, esto lo hacemos de la siguiente manera show(Note $note)
    //donde "Note" es debe ser el mism o nombre que el que tenemos en App\Note
    //tambien en mi archivo de rutas routes/web.php el parametro que envio debe
    //tener el mismo nombre que el parametro que recibo en la función 
    //show(Note $note)
    public function show(Note $note)
    {
    	//comento esta linea porque estoy usando el route model binding
        //$note = Note::find($id);
		return view('notes/show', ['note'=>$note]);
    }

    public function create()
    {
      //funciona tanto 'notes.create' como 'notes/create'
      //instanciamos el modelo group (app/group) y hacemos un select * from 
      // para enviarlo a la vista notes.create
      //$groups = Group::all();
      //El método de pluck recupera todos los valores para una clave determinada
      $groups = Group::pluck('name', 'id');
      return view('notes.create', compact('groups'));
    }

    public function store(NotesRequest $request)
    {
        //helper request() nos devuelve una instancia del objeto request, el 
        //cual muestra todos los datos que llegan a través de las peticiones
        //helper dd() muestra el contenido de una variable y detiene la 
        //ejecución del sistema
        //request()->all() veo todo lo que me llega del formulario
        //request()->NombreDelCampo para un campo en especifico
        //dd(request()->all());

        //vamos a guardar de 2 formas
        //esta es la primera
        /*$note = new Note; //instanciamos el modelo Note
        $note->title = request()->title;
        $note->body = request()->body;
        $note->important = is_null(request()->important) ? 0 : 1;
        $note->save();*/

        //Y esta la segunda
        //para validar uasaremos el metodo validate
        /*$data=request()->validate([
            'title' => 'required',
            'body' => 'required|min:5',
            'important' => 'required',
        ]);
        Note::create($data);
        */
        //Note::create($request->all());//otra forma de guardar
        Note::create(request()->all());
        return redirect('/notes');
        //return back();//nos retornaria a la ruta anterior.


    }

    public function edit(Note $note)
    {
        //$groups = Group::all();
        $groups = Group::pluck('name', 'id');
        return view('notes/edit', compact('note','groups'));
    }

    public function update(Note $note, NotesRequest $request)
    {
        //para validar uasaremos el metodo validate
        /*request()->validate([
            'title' => 'required',
            'body' => 'required|min:5',
        ]);*/
        $note->update(request()->all());
        return redirect('/notes');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect('/notes');
    }
}
