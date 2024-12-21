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
    <link rel="icon" href="{{ url('/images/logo.png') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ url('/images/logo.png') }}" type="image/x-icon" />
    <title>{{ 'Admin | ' . config('app.name') }}</title>
    <!-- Google font-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="" />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/font-awesome.css') }}" />
    {{-- Icons --}}
    <link href="{{ url('/fonts/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/icofont.css') }}" />
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/themify.css') }}" />
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/flag-icon.css') }}" />
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/feather-icon.css') }}" />
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/scrollbar.css') }}" />
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/scrollbar.css') }}" />
    @yield('css')
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/vendors/bootstrap.css') }}" />
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/style.css') }}" />
    <link id="color" rel="stylesheet" href="{{ url('/css/color-1.css') }}" media="screen" />
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ url('/css/responsive.css') }}" />
  </head>
  <body>
    <!-- Loader starts-->
    <div class="loader-wrapper">
      <div class="loader">
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-bar"></div>
        <div class="loader-ball"></div>
      </div>
    </div>
    
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper">
              <a href="index.html"><img class="img-fluid" src="{{ url('/images/logo.png') }}" alt="" /></a>
            </div>
            <div class="toggle-sidebar">
              <div class="status_toggle sidebar-toggle d-flex">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <g>
                    <g>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 6.6738C21.0003 8.7024 19.3551 10.3476 17.3265 10.3476C15.2979 10.3476 13.6536 8.7024 13.6536 6.6738C13.6536 4.6452 15.2979 3 17.3265 3C19.3551 3 21.0003 4.6452 21.0003 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 6.6738C10.3467 8.7024 8.7024 10.3476 6.6729 10.3476C4.6452 10.3476 3 8.7024 3 6.6738C3 4.6452 4.6452 3 6.6729 3C8.7024 3 10.3467 4.6452 10.3467 6.6738Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0003 17.2619C21.0003 19.2905 19.3551 20.9348 17.3265 20.9348C15.2979 20.9348 13.6536 19.2905 13.6536 17.2619C13.6536 15.2333 15.2979 13.5881 17.3265 13.5881C19.3551 13.5881 21.0003 15.2333 21.0003 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3467 17.2619C10.3467 19.2905 8.7024 20.9348 6.6729 20.9348C4.6452 20.9348 3 19.2905 3 17.2619C3 15.2333 4.6452 13.5881 6.6729 13.5881C8.7024 13.5881 10.3467 15.2333 10.3467 17.2619Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                  </g>
                </svg>
              </div>
            </div>
          </div>
          <div class="left-side-header col ps-0 d-none d-md-block">
          </div>
          <div class="nav-right col-10 col-sm-6 pull-right right-header p-0">
            <ul class="nav-menus">
              <li>
                <div class="mode animated backOutRight">
                  <svg class="lighticon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <g>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M18.1377 13.7902C19.2217 14.8742 16.3477 21.0542 10.6517 21.0542C6.39771 21.0542 2.94971 17.6062 2.94971 13.3532C2.94971 8.05317 8.17871 4.66317 9.67771 6.16217C10.5407 7.02517 9.56871 11.0862 11.1167 12.6352C12.6647 14.1842 17.0537 12.7062 18.1377 13.7902Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </g>
                  </svg>
                  <svg class="darkicon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M17 12C17 14.7614 14.7614 17 12 17C9.23858 17 7 14.7614 7 12C7 9.23858 9.23858 7 12 7C14.7614 7 17 9.23858 17 12Z"></path>
                    <path d="M18.3117 5.68834L18.4286 5.57143M5.57144 18.4286L5.68832 18.3117M12 3.07394V3M12 21V20.9261M3.07394 12H3M21 12H20.9261M5.68831 5.68834L5.5714 5.57143M18.4286 18.4286L18.3117 18.3117" stroke-linecap="round" stroke-linejoin="round"></path>
                  </svg>
                </div>
              </li>
              <li class="maximize">
                <a class="text-dark" href="#" onclick="javascript:toggleFullScreen(); javascript:void(0)">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <g>
                        <path d="M2.99609 8.71995C3.56609 5.23995 5.28609 3.51995 8.76609 2.94995" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M8.76616 20.99C5.28616 20.41 3.56616 18.7 2.99616 15.22L2.99516 15.224C2.87416 14.504 2.80516 13.694 2.78516 12.804" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M21.2446 12.804C21.2246 13.694 21.1546 14.504 21.0346 15.224L21.0366 15.22C20.4656 18.7 18.7456 20.41 15.2656 20.99" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M15.2661 2.94995C18.7461 3.51995 20.4661 5.23995 21.0361 8.71995" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </g></svg
                ></a>
              </li>
              <li class="profile-nav onhover-dropdown pe-0 py-0 me-0">
                <div class="media profile-media">
                  <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g>
                      <g>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55851 21.4562C5.88651 21.4562 2.74951 20.9012 2.74951 18.6772C2.74951 16.4532 5.86651 14.4492 9.55851 14.4492C13.2305 14.4492 16.3665 16.4342 16.3665 18.6572C16.3665 20.8802 13.2505 21.4562 9.55851 21.4562Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M9.55849 11.2776C11.9685 11.2776 13.9225 9.32356 13.9225 6.91356C13.9225 4.50356 11.9685 2.54956 9.55849 2.54956C7.14849 2.54956 5.19449 4.50356 5.19449 6.91356C5.18549 9.31556 7.12649 11.2696 9.52749 11.2776H9.55849Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M16.8013 10.0789C18.2043 9.70388 19.2383 8.42488 19.2383 6.90288C19.2393 5.31488 18.1123 3.98888 16.6143 3.68188" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M17.4608 13.6536C19.4488 13.6536 21.1468 15.0016 21.1468 16.2046C21.1468 16.9136 20.5618 17.6416 19.6718 17.8506" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                      </g>
                    </g>
                  </svg>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li>
                    <a href="{{ route('logout') }}"><i data-feather="log-out"> </i><span>Log out</span></a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
              <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
              <div class="ProfileCard-details">
                <div class="ProfileCard-realName">Motionlab</div>
              </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template">
            <div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div>
          </script>
        </div>
      </div>
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper">
              <img class="ms-1" width="130 height="160" src="{{ url('/images/logo-expand.png') }}" alt="">
            </div>
            <div class="logo-icon-wrapper">
              <a href="index.html"><img class="img-fluid" src="{{ url('/images/logo-expand.png') }}" alt="" /></a>
            </div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn">
                    <a href="index.html"><img class="img-fluid" src="{{ url('/images/logo-icon.png') }}" alt="" /></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"> </i></div>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('dashboard') }}">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g>
                            <path d="M9.07861 16.1355H14.8936" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.3999 13.713C2.3999 8.082 3.0139 8.475 6.3189 5.41C7.7649 4.246 10.0149 2 11.9579 2C13.8999 2 16.1949 4.235 17.6539 5.41C20.9589 8.475 21.5719 8.082 21.5719 13.713C21.5719 22 19.6129 22 11.9859 22C4.3589 22 2.3999 22 2.3999 13.713Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g></svg>
                      <span class="">Dashboard</span>
                    </a>
                  </li>
                  <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('blogs.index') }}">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g>
                          <g>
                            <path d="M7.4831 10.261V16.9547" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M12.0368 7.05737V16.9553" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M16.5158 13.7983V16.9552" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2.30005 12.0369C2.30005 4.73479 4.73479 2.30005 12.0369 2.30005C19.339 2.30005 21.7737 4.73479 21.7737 12.0369C21.7737 19.339 19.339 21.7737 12.0369 21.7737C4.73479 21.7737 2.30005 19.339 2.30005 12.0369Z" stroke="#130F26" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                          </g>
                        </g></svg
                      >
                      <span class="">Blogs</span>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">@yield('content')</div>
        <!-- footer start-->
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-12 footer-copyright text-center">
                <p class="mb-0">Copyright {{ date('Y') }} © DuniaBelanja</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- latest jquery-->
    <script src="{{ url('/js/jquery-3.5.1.min.js') }}"></script>
    <!-- Bootstrap js-->
    <script src="{{ url('/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- feather icon js-->
    <script src="{{ url('/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ url('/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- scrollbar js-->
    <script src="{{ url('/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ url('/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery-->
    <script src="{{ url('/js/config.js') }}"></script>
    <!-- Plugins JS start-->
    <script src="{{ url('/js/sidebar-menu.js') }}"></script>
    @yield('js')
    <script src="{{ url('/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ url('vendor/autonumeric/autonumeric.min.js') }}"></script>
    <script>
      AutoNumeric.multiple('.numeric', { digitGroupSeparator: '.', decimalCharacter: ',', decimalPlaces: '0', unformatOnSubmit: true });
    </script>
    <!-- Plugins JS Ends-->
    <!-- Theme js-->
    <script src="{{ url('/js/script.js') }}"></script>
    <script src="{{ url('/js/theme-customizer/customizer.js') }}"></script>
    <!-- login js-->
    <!-- Plugin used-->
    @include('components.alert')
  </body>
</html>
