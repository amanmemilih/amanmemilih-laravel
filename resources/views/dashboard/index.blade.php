@extends('layouts.admin')

@section('css')
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/animate.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/chartist.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/owlcarousel.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/prism.css') }}" />
@endsection

@section('js')
  <script src="{{ url('/js/chart/chartjs/chart.min.js') }}"></script>
  <script src="{{ url('/js/chart/chartist/chartist.js') }}"></script>
  <script src="{{ url('/js/chart/chartist/chartist-plugin-tooltip.js') }}"></script>
  <script src="{{ url('/js/chart/apex-chart/apex-chart.js') }}"></script>
  <script src="{{ url('/js/chart/apex-chart/stock-prices.js') }}"></script>
  <script src="{{ url('/js/prism/prism.min.js') }}"></script>
  <script src="{{ url('/js/counter/jquery.waypoints.min.js') }}"></script>
  <script src="{{ url('/js/counter/jquery.counterup.min.js') }}"></script>
  <script src="{{ url('/js/counter/counter-custom.js') }}"></script>
  <script src="{{ url('/js/owlcarousel/owl.carousel.js') }}"></script>
  <script src="{{ url('/js/owlcarousel/owl-custom.js') }}"></script>
  <script src="{{ url('/js/dashboard/dashboard_2.js') }}"></script>
  <script src="{{ url('/js/tooltip-init.js') }}"></script>
@endsection

@section('content')
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-sm-6">
          <h3>
            Dashboard</h3>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid default-dash">
    <div class="row">
      <div class="col-xl-12 col-md-12">
        <div class="card profile-greeting">
          <div class="card-body">
            <div class="media">
              <div class="media-body"> 
                <div class="greeting-user">
                  <h1>Hello, {{ auth()->user()->name }}</h1>
                  <p>Selamat datang di menu dashboard yang penuh keceriaan dan keseruan! Bersiaplah untuk menjelajahi dunia pilihan yang tak terbatas.</p>
                </div>
              </div>
            </div>
            <div class="cartoon-img"><img class="img-fluid" src="{{ url('images/images.svg') }}" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection