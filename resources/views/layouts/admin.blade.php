<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmanMemilih | Admin</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/rowreorder/1.5.0/css/rowReorder.bootstrap5.css" rel="stylesheet">
    @yield('css')
    <style>
        body {
            overflow: hidden;
        }
        .content-wrapper {
            overflow-y: auto;
            height: 100vh;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <nav class="bg-danger text-white p-3" style="width: 250px; height: 100vh; position: fixed;">
            <h5 class="mb-4">AmanMemilih</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a href="{{ route('blogs.index') }}" class="nav-link text-white">Berita</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-white">Logout</a>
                </li>
            </ul>
        </nav>

        <div class="flex-grow-1 content-wrapper" style="margin-left: 250px;">
            <header class="bg-light p-3 shadow-sm">
                <h4></h4>
            </header>

            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>

    
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/dataTables.rowReorder.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.5.0/js/rowReorder.bootstrap5.js"></script>
    @yield('script')
</body>
</html>