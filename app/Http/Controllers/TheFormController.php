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
        $done = 'Mark this todo as done';
        $edit = 'Click this to edit this item';
        $delete = 'Click this icon if you want to delete this todo item';

        # Taking the created Todos from the user 
        return view('welcome', [ 'todos' => $todos, 'done' => $done, 'edit' => $edit, 'delete' => $delete ]);
    }

    public function store() 
    { 
        # And then storing it right here in the database.
        $attributes = request()->validate([
            'title' => 'required|string', 
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
