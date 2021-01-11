<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Coach Tribe | Under Construction</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Packages -->
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <!-- Styles -->
          <style>
            .gradient {
              background-image: linear-gradient(135deg, #684ca0 35%, #1c4ca0 100%);
            }
          </style>

    </head>
    <body>
          <div class="gradient text-white min-h-screen flex items-center">
            <div class="container mx-auto p-4 flex items-center space-x-32">
              <div class="w-full md:w-5/12 text-center p-4">
                <img src="https://cdn.pixabay.com/photo/2014/04/02/17/03/gear-307780_960_720.png" alt="maintenance" />
              </div>
              <div class="w-full md:w-7/12 text-center md:text-left p-4">
                <!-- <div class="text-6xl font-medium">404</div> -->
                <div class="text-xl md:text-3xl font-medium mb-4">
                  We will be back soon.
                </div>
                <div class="text-lg mb-8">
                  We are under maintenance.
                </div>
                @guest
                <a href="{{ route('login') }}" class="bg-black focus:outline-none rounded py-3 px-6 font-medium text-xl">Login</a>
                @else
                <a href="{{ url('/home') }}" class="bg-black focus:outline-none rounded py-3 px-6 font-medium text-xl">Home</a>
                @endguest
              </div>
            </div>
          </div>
    </body>
</html>

