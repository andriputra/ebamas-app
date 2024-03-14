<!-- resources/views/components/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-3 bg-light">
                <!-- Sidebar content -->
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Menu 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Menu 3</a>
                    </li>
                </ul>
            </div>
            <!-- /Sidebar -->

            <!-- Content -->
            <div class="col-9">
                <!-- Top Bar -->
                <nav class="navbar navbar-light bg-light">
                    <div class="container-fluid">
                        <span class="navbar-brand mb-0 h1">Top Bar</span>
                        <div>
                            <a href="#" class="navbar-text">Account Login</a>
                        </div>
                    </div>
                </nav>
                <!-- /Top Bar -->

                <!-- Content -->
                <div class="mt-3">
                    @yield('content')
                </div>
                <!-- /Content -->
            </div>
            <!-- /Content -->
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
