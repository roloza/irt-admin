<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://unpkg.com/@coreui/coreui@3.0.0-alpha.13/dist/css/coreui.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.css" integrity="sha256-kalgQ55Pfy9YBkT+4yYYd5N8Iobe+iWeBuzP7LjVO0o=" crossorigin="anonymous" />
    @yield('styles')
    <title>CoreUI</title>
  </head>
  <body class="c-app">
      <!-- Sidebar content here -->
      @include('sidebar')

    <div class="c-wrapper">
      <!-- Header content here -->
      @include('header')

    <div class="c-body">
        <main class="c-main">
          <!-- Main content here -->
          <div class="container-fluid">
            
            @yield('content')
          </div>
        </main>
      </div>
      <footer class="c-footer">
        <!-- Footer content here -->
      </footer>

    <!-- Optional JavaScript -->
    <!-- Popper.js first, then CoreUI JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js" integrity="sha384-L2pyEeut/H3mtgCBaUNw7KWzp5n9&#43;4pDQiExs933/5QfaTh8YStYFFkOzSoXjlTb" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.0.0-alpha.13/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js" integrity="sha256-d/edyIFneUo3SvmaFnf96hRcVBcyaOy96iMkPez1kaU=" crossorigin="anonymous"></script>
    <script>
      $('select').select2();
    </script>
     @yield('scripts')
  </body>
</html>