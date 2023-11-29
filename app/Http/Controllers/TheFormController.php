<?php

namespace App\Http\Controllers;

use App\Models\theForm;
use Illuminate\Http\Request;

class TheFormController extends Controller
{
    public function index()
    {
        # Showing what was stored in the database
        $todos = theForm::all();

        # Taking the created Todos from the user 
        return view('welcome', [ 'todos' => $todos ]);
    }

    public function store() 
    {
        # And then storing it right here in the database.
        $attributes = request()->validate([
            'title' => 'required', 
            'description' => 'nullable' 
        ]);

        theForm::create($attributes);

        return redirect('/');
    }

    public function update() { 
        $todos = theForm::all();

        return view('update.edit', [ 'todos' => $todos]);
    }

    public function done(theForm $todo) 
    {
        # For updateing a particular Todo
        $todo->update(['isDone'=> true]);

        return redirect('/');
    }

    public function delete(theForm $todo)
    {
        # For deleteing a particular Todo
        $todo->delete(['isDone' => true]);

        return redirect('/');
    }

}
