<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Todo-App</title>

        <link href="https://fonts.googleapis.com/css?family=Tangerine:bold,bolditalic|Aboreto|Inconsolata:italic|Droid+Sans">

        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-repeat: no-repeat;
                width: 100%;
                height: 100vh;
            }
            .gradient-text {
                background: linear-gradient(to right, #3498db, #2ecc71);
                -webkit-background-clip: text; /* For Safari */
                color: transparent;
            }
        </style>
    </head>

    <body class="bg-gray-200 p-4">

        <img src="/images/background.jpg" alt="icon_image" width="60px" height="60px">

        <div class="lg:w-2/4 mx-auto py-8 px-6 bg-white rounded-xl mt-12">
            <h1 class="gradient-text font-bold text-5xl text-center mb-8">
                Todo App with Laravel
            </h1>

            <div class="mb-6">
                <form class="flex flex-col space-y-4" method="POST" action="/">
                    @csrf
                    <!---The above CSRF had already made the whole linking to the controller from the "action='/'" ---->
                    <input type="text" name="title" placeholder="Your Todo title" class="py-3 px-4 bg-gray-100 rounded-xl">
                    
                    <textarea name="description" placeholder="Your Todo description" class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>
                    
                    <div class="text-center">
                        <button class="w-40 py-4 px-8 bg-green-500 text-white rounded-xl">
                            Update your Todo
                        </button>
                    </div>
                </form>
            </div>

            <hr>


             <div class="mt-2">
                @foreach ($todos as $todo)
                    <div @class([
                            'p-4 flex items-center border-b border-gray-300 px-3',
                            $todo->isDone ? 'bg-green-200' : ''
                        ])>

                        <div class="flex-1 pr-8">
                            <h3 class="text-lg font-semibold">{{ $todo->title }}</h3>
                            <p class="text-gray-500">{{ $todo->description }}</p>
                        </div>

                    </div>
                @endforeach
             </div>


        </div>
    </body>
</html>
