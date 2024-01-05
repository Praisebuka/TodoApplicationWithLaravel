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
                /* background-image: url('/images/nice.png'); */
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

        <div class="lg:w-2/3 mx-auto py-8 px-6 bg-white rounded-xl mt-12">
            <h1 class="gradient-text font-bold text-5xl text-center mb-8">
                Todo App with Laravel
            </h1>

            <div class="mb-6"> 
                <form class="flex flex-col space-y-4" method="POST" action="/">
                    @csrf
                    <!---The above CSRF had already made the whole linking to the controller from the "action='/'" ---->
                    <input type="text" name="title" placeholder="Your Todo title" class="py-3 px-4 bg-gray-100 rounded-xl">
                    
                    <textarea name="description" placeholder="Your Todo description" class="py-3 px-4 bg-gray-100 rounded-xl"></textarea>
                    
                    <div class="text-center text-2xl">
                        <button class="w-64 h-20 py-4 px-8 bg-green-500 text-white rounded-xl font-bold">
                            Add-Items
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

                        <div class="flex space-x-3">

                            <form method="POST" action="/{{ $todo->id }}">
                                @csrf
                                @method('PATCH')
                                <button class="py-2 px-2 bg-green-500 text-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" title="done">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 01-1.043 3.296 3.745 3.745 0 01-3.296 1.043A3.745 3.745 0 0112 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 01-3.296-1.043 3.745 3.745 0 01-1.043-3.296A3.745 3.745 0 013 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 011.043-3.296 3.746 3.746 0 013.296-1.043A3.746 3.746 0 0112 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 013.296 1.043 3.746 3.746 0 011.043 3.296A3.745 3.745 0 0121 12z" />
                                    </svg>
                                </button>
                            </form>

                            <form method="POST" action="/{{ $todo->id }}">
                                @method('PUT')
                                <button class="py-2 px-2 bg-blue-500 text-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6" title="edit">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l2 2-2 2M4 11a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2H6a2 2 0 01-2-2v-8z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l2 2-2 2"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 001 1h4a1 1 0 001-1V3a2 2 0 00-2-2h-1a2 2 0 00-2 2z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 8l-6 6"></path>
                                    </svg>
                                </button>
                            </form>  

                            <form method="POST" action="/{{ $todo->id }}">
                                @csrf
                                @method('DELETE')   
                                <button class="py-2 px-2 bg-red-500 text-white rounded-xl">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6" title="delete">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </button>
                            </form>

                        </div>
                    </div>
                @endforeach
             </div>


        </div>
        
    </body>
</html>
