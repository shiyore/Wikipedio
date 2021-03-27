<html>
<!-- 
    Written by Aiden Yoshioka 02/14/21
    
    This is the basic layout for our project. The name should be changed from navbar.blade.php to better suite it's purpose, but I don't have the time to make too many changes ATM.
 -->
    <head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        @section('navbar')
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
<<<<<<< Updated upstream
              <a class="navbar-brand" href="/wikipedio/public/"><h2>Wikipedio</h2></a>
=======
<<<<<<< HEAD
              <a class="navbar-brand" href="/"><h2>Wikipedio</h2></a>
=======
              <a class="navbar-brand" href="/wikipedio/public/"><h2>Wikipedio</h2></a>
>>>>>>> 3d200cda5312af1eb84039a7b2122db46748581b
>>>>>>> Stashed changes
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
<<<<<<< Updated upstream
                  <a class="nav-item nav-link" href="/wikipedio/public/new">New Article <span class="sr-only"></span></a>
=======
<<<<<<< HEAD
                  <a class="nav-item nav-link" href="/new">New Article <span class="sr-only"></span></a>
=======
                  <a class="nav-item nav-link" href="/wikipedio/public/new">New Article <span class="sr-only"></span></a>
>>>>>>> 3d200cda5312af1eb84039a7b2122db46748581b
>>>>>>> Stashed changes
                </div>
              </div>
            </nav>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>