<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Instanciones App\Note
//Use App\Note;
Route::get('/', function(){
	return view('welcome');
});
Route::get('/notes/all', 'NotesAllGroupController@index');
Route::get('/notes', 'NotesWithoutGroupController@index');
Route::get('/groups/{group}/notes', 'NotesController@index');
//vamos a usar route model binding por tal motivo el parametro que vamos a pasar 
//al controlador NotesController@show debe tener el mismo nombre que tiene en el 
//modelo, en vez de llamrase {id} se va llamar {note}. metodo  
//show(Note $note) ubicado en app/Controllers/NotesController.php
//Route::get('/notes/{id}', 'NotesController@show');
Route::get('notes/create', 'NotesController@create');
Route::get('/notes/{note}', 'NotesController@show');
Route::get('/notes/{note}/edit', 'NotesController@edit');
Route::patch('/notes/{note}', 'NotesController@update');
Route::post('/notes', 'NotesController@store');
Route::delete('/notes/{note}', 'NotesController@destroy');
Route::get('/contact', function () {
	return view('contact');
});
//Route::get('/notes', function () {
	//Todas las notas con el constructor de consultas
	//$notes = DB::table('notes')->get();

	//Todas las notas con el orm de laravel Eloquent
	//$notes = App\Note::all();

	//asi queda cunado instanciamos
	//$notes = Note::all();


	//agragando un condicoinal
	//$notes = DB::table('notes')->where('important',1)->get();

	//$notes = DB::table('notes')->groupBy('important',0)->get();
	//return $notes;

	//return view('notes/index', ['notes'=>$notes]);
	/*$notes= [
		[
			'tittle'=>'Rutas Laravel',
			'body'=>'Las rutas se definen en el archivo routes/web.php',
			'important'=> true
		],
		[
			'tittle'=>'Blade',
			'body'=>'Blade es el m otor de plantillas de Laravel',
			'important'=> false
		],
	];

    $date = date('Y-m-d H:i:s');
    return view('welcome', ['notes'=>$notes]);*/
//});

//Route::get('/notes/{id}', function($id){
	
	//Usando el constructor de c onsultas
	//$note = DB::table('notes')->find($id);

	//Usando orm de laravel Eloquent
	//$note = App\Note::find($id);

	//asi queda cunado instanciamos
	//$note = Note::find($id);

	//return view('notes/show', ['note'=>$note]);
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
