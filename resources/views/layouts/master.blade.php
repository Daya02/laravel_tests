<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

    <title>Lara Books</title>
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/tooplate-main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
  </head>

  <body>
      
    @yield('content')

      <script src="{{ asset('vendor/jquery/jquery.min.js') }} "></script>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }} "></script> 
      <script src="{{ asset('assets/js/custom.js') }} "></script>
      <script src="{{ asset('assets/js/owl.js') }} "></script> 
    </body>  
  </html>
  