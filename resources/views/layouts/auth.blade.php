<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities." />
    <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app" />
    <meta name="author" content="pixelstrap" />
    <link rel="icon" href="{{ @$identitas['image'] }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ @$identitas['image'] }}" type="image/x-icon" />
    <title>{{ 'Admin | ' . config('app.name') }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    {{-- Icons --}}
    <link href="{{ url('/fonts/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/bootstrap.css') }}" />
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.css') }}" />

    <style>
      .payslip-print {
          background-color: #f0f2f8; 
          margin: auto 10px;
          height: 2000px;
        }
      @media print {
        .hidden-print {
          visibility: hidden;
        }
        .payslip-print {
          background-color: white; 
          height: 100vh;
        }
      }
    </style>
  </head>
  <body>
    <!-- login page start-->
    @yield('content')
  
    <!-- latest jquery-->
    <script src="{{ url('/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ url('/js/bootstrap/bootstrap.bundle.min.js') }}"></script>

    @yield('script')
  </body>
</html>