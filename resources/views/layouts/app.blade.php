<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{$title}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

        <!-- jquery from google source -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"> </script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"> </script>
        
        <!-- Link to Stylesheet -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/home.css')}}" type="text/css" />
        <link rel="stylesheet" href="{{asset('css/menu.css')}}" type="text/css" />

        <!-- toastr -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" type="text/css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"> </script>

        <script type="text/javascript" src="{{ URL::asset('js/bootstrap-collapse.js') }}"></script>

        <!-- Link to Javascript code for page -->
        <script type="text/javascript" language="Javascript" src="./popup.js"> </script>
        <script type="text/javascript" language="Javascript" src="./functions.js"> </script>
        
    </head>
    <body>
        @include('menu')

        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>
    </body>
</html>
