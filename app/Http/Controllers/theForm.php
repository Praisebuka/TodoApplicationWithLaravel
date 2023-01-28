<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class theForm extends Controller
{
    public function up() {
        $errors = "";

// insert a quote if submit button is clicked
        if (isset($_POST['submit'])) {

            if (empty($_POST['task'])) {
                        $errors = "You must fill in the task in order to get to the next stage";
        } else { 
            $task = $_POST['task'];
        $sql = "INSERT INTO tasks (task) VALUES ('$task')"; 
        mysqli_query($db, $sql);

        return view('index.blade.php');
            
            }
        } 

    }
}
