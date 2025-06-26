
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPK Salesman | TOPSIS </title>
  @vite(['resources/sass/app.scss', 'resources/js/app.js']);
  <link rel="shortcut icon" type="image/png" href="{{asset('Assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('Assets/css/styles.min.css')}}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('components.sidebar')
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">

      <!--  Header Start -->
      @include('components.header')
      <!--  Header End -->

      {{-- Content Start --}}
      <div class="container-fluid">
           @yield('content')
      </div>
      {{-- Content End --}}
        
        {{-- Footer Start --}}
        @include('components.footer')
        {{-- Footer End --}}
      </div>
    </div>
  </div>


  <script src="{{asset('Assets/libs/jquery/dist/jquery.min.js')}}"></script>
  {{-- <script src="{{asset('Assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script> --}}
  <script src="{{asset('Assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('Assets/js/app.min.js')}}"></script>
  <script src="{{asset('Assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('Assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('Assets/js/dashboard.js')}}"></script>

  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


  {{-- <script src="{{asset('Assets/js/script.js')}}"></script> --}}
  @stack('js')

</body>

</html>