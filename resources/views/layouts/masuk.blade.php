<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Avicenna Book Store</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Avicenna Book Store</title>
    <!-- Boostrap-->
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.css" media="screen" title="no title">
    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css" media="screen" title="no title">
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"> </script>
    <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"> </script>
    <!-- FontAwsome-->
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css" media="screen" title="no title">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css" media="screen" title="no title">

    <!-- MyCss-->
    <link rel="stylesheet" href="/css/app.css" media="screen" title="no title">
    <!-- JQuery-->
    <script type="text/javascript" src="assets/jquery/jquery.js"> </script>
    <script type="text/javascript" src="assets/jquery/jquery.min.js"> </script>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
  <body>
    <center>
    <img src="assets/img/Avicenna.png" alt="" id="pintu" />
    </center>
    @yield('content')
  </body>
  </html>
