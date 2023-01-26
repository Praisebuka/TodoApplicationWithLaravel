<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo-App</title>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url('resources/views/background');
            }
            img {
                width: 100%;
                height: 100%;
            }
            .heading{
                width: 50%;
                margin: 30px auto;
                text-align: center; 
                color: #6B8E23; 
                background: #FFF8DC; 
                border: 2px solid #6B8E23; 
                border-radius: 20px; 
            }
             form { 
                width: 50%; 
                margin: 30px auto; 
                border-radius: 5px; 
                padding: 10px; 
                background: #FFF8DC; 
                border: 1px solid #6B8E23; 
            }
             form p { 
                color: red; 
                margin: 0px; 
            } 
            .task_input { 
                width: 75%; 
                height: 15px; 
                padding: 10px; 
                border: 2px solid #6B8E23; 
            } 
            .add_btn { 
                height: 39px; 
                background: #FFF8DC; 
                color: #6B8E23; 
                border: 2px solid #6B8E23; 
                border-radius: 5px; 
                padding: 5px 20px; 
            } 
            table { 
                width: 50%; 
                margin: 30px auto; 
                border-collapse: collapse; 
            } 
            tr { 
                border-bottom: 1px solid #cbcbcb; 
            } 
            th { font-size: 19px; 
                color: #6B8E23; 
            }
             th, td{ 
                border: none; 
                height: 30px; 
                padding: 2px; 
            }
             tr:hover { 
                background: #E9E9E9; 
            } 
            .task { 
                text-align: left; 
            }
             .delete{ 
                text-align: center; 
            } 
            .delete a{ 
                color: white; 
                background: #a52a2a; 
                padding: 1px 6px; 
                border-radius: 3px; 
                text-decoration: none;
            }

        </style>
    </head>
    <body>
       
        <img src="./images/background.jpg" alt="theBackground" style="width:500px;height:600px; >

    <div class="heading">
        <h2 style="font-style: 'Hervetica'; ">Todo Application with Laravel</h2>
    </div>
        
    <form method="post" action="index.php" class="input_form"> 
            <input type="text" name="task" class="task_input">

        <button type="submit" name="submit" id="add_btn" class="add_btn">
             Add Task
        </button>

    </form>
    </body>
</html>
