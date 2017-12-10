<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>$Title$</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://use.fontawesome.com/87b76e9284.js"></script>

    </head>
    
    <body>

    @include('includes.header')
        <div class="container">
            @yield('content')
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous">

    </script>

    <script src="js/partial.js"> /* or we can work here with jquery */
    </script>

    </body>
</html>