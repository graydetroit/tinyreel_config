<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tiny Reel for Pebble</title>
        <link rel="stylesheet" href="css/app.css">
        <link rel="stylesheet" href="css/slate.min.css">
        <link rel="stylesheet" href="http://css-spinners.com/css/spinner/timer.css" type="text/css">
        <script src="//use.typekit.net/phm6sfq.js"></script>
        <script>try{Typekit.load();}catch(e){}</script>
    </head>
    <body>
        <div class="header centered">
            <h1>TINY REEL</h1><br/>
            <small>View your instagram feed on your pebble!</small>
        </div>
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="js/slate.min.js"></script>
    <script src="js/all.js"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-65010481-1', 'auto');
      ga('send', 'pageview');

    </script>
</html>
