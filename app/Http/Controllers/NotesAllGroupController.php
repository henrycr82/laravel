<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Note;
Use App\Group;

class NotesAllGroupController extends Controller
{
    public function index()
    {
		$groups = Group::all();
		$notes = Note::all();
		return view('notes/index',compact('notes','groups'));
    }
}
