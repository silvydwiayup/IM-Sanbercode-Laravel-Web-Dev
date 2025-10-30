<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset("templating/src/assets/images/logos/seodashlogo.png") }}" />
  <link rel="stylesheet" href="{{ asset("templating/src/node_modules/simplebar/dist/simplebar.min.css") }}">
  <link rel="stylesheet" href="{{ asset("templating/src/assets/css/styles.min.css") }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
        <!--  Header Start -->
        @include('layouts.header')
      <!--  Header End -->
      <div class="container-fluid">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title fw-semibold mb-4">@yield('header')</h5>
            <p class="mb-0">@yield('bodyContent') </p>
          </div>
      </div>
    </div>
  </div>
  <script src="{{ asset("templating/src/assets/libs/jquery/dist/jquery.min.js") }}"></script>
  <script src="{{ asset("templating/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
  <script src="{{ asset("templating/src/assets/libs/simplebar/dist/simplebar.js") }}"></script>
  <script src="{{ asset("templating/src/assets/js/sidebarmenu.js") }}"></script>
  <script src="{{ asset("templating/src/assets/js/app.min.js") }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>