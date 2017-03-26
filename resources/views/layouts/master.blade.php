<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title', 'Foobooks')
    </title>

    <meta charset='utf-8'>
    <link href="/css/orders.css" type='text/css' rel='stylesheet'>
    <!-- Latest compiled and minified CSS -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

     <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

     <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @stack('head')

</head>
<body class="container">

    <header>
        <img
        src='/images/BillSplitter.jpg'
        style='width:350px'
        alt='BillSplitter Logo'>
    </header>



      <section>
          @yield('content')
      </section>
    



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')
    <footer>
        &copy; {{ date('Y') }}
    </footer>

</body>
</html>
