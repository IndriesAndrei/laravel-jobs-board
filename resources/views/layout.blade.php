<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    
    <title>Document</title>
</head>
<body>
    <div class="container mx-auto">
        <div class="flex justify-between">
            <div class="flex flex-x-6">
                <a href="/"><img class="w-20 mr-5" src="{{ asset('/images/logo.png') }}"/></a>
                <h1 class="text-5xl justifyr">LaraGrinds</h1>
            </div>
    

           <ul class="flex space-x-6 mr-6 text-lg p-3">
               @auth
                    <li>
                        <span class="font-bold uppercase">
                            Welcome {{ auth()->user()->name }}
                        </span>
                    </li>
                    <li>
                        <a href="/listings/manage" class="bg-red-500 rounded p-2 text-white"><i class="fa fa-cog" aria-hidden="true"></i> Manage Listings</a>
                    </li>
                    <li>
                        <form class="inline" method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="text-red-500"><i class="fa fa-eject" aria-hidden="true"></i>
                                Logout</button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register" class="bg-red-500 rounded p-2 text-white"><i class="fa fa-user" aria-hidden="true"></i> Register</a>
                    </li>
                    <li>
                        <a href="/login" class="bg-red-500 rounded p-2 text-white"><i class="fa fa-user-circle" aria-hidden="true"></i> Login</a>
                    </li>
                @endauth
           </ul>
        </div>

        @yield('content')
    </div>

    <x-flash-message />
    
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
@include('footer')