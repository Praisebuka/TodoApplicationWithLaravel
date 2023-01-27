<?php

namespace App\Http\Controllers;

use App\Models\theForm;
use Illuminate\Http\Request;

class TheFormController extends Controller
{
    public function index()
    {
        //Showing what was stored in the database
        $todos = theForm::all();

        //Taking the created Todos from the user 
        return view('welcome', [
            'todos' => $todos
        ]);
    }

    public function store() 
    {
        //And then storing it right here in the database.
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        theForm::create($attributes);

        return redirect('/');
    }

    public function update(theForm $todo) 
    {
        $todo->update(['isDone'=> true]);

        return redirect('/');
    }
}
