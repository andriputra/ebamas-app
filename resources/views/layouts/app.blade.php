<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/ebamas-favicon.png') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/brands.min.css" integrity="sha512-8RxmFOVaKQe/xtg6lbscU9DU0IRhURWEuiI0tXevv+lXbAHfkpamD4VKFQRto9WgfOJDwOZ74c/s9Yesv3VvIQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#" class="collapse-sidebar" id="CollapseMenu">
                    <i class="fa-solid fa-ellipsis-vertical"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> {{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-pen"></i> {{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @include('layouts.sidebar')
        
        <main class="py-4" id="ContentArea">
            @yield('content')
            <div class="auth-page">
            @yield('autharea')
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function(){
            $("#CollapseMenu").click(function(){
                $(".sidebar").toggleClass("collapsed");
                $(".navbar").toggleClass("collapsed");
                $("#ContentArea").toggleClass("collapsed");
                if ($(".navbar").hasClass("collapsed")) {
                    $("#CollapseMenu i").removeClass("fa-ellipsis-vertical").addClass("fa-bars");
                } else {
                    $("#CollapseMenu i").removeClass("fa-bars").addClass("fa-ellipsis-vertical");
                }
            });
        });
    </script>    
    <script>
        $(document).ready(function(){
            // Function to add new row
            document.getElementById('addInputBtn').addEventListener('click', function () {
                const tableBody = document.getElementById('invoiceTable').getElementsByTagName('tbody')[0];
                const newRow = tableBody.insertRow();
                newRow.classList.add('invoice-row');
                newRow.innerHTML = `
                    <td><input type="text" class="form-control" name="deskripsi[]"></td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control price-currency" name="price[]" id="amountRupiah">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <input type="text" class="form-control price-currency" name="amount[]" id="amountRupiah">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="removeRow(this)"><i class="fa-solid fa-trash-can"></i></button>
                    </td>
                `;
            });
            
            // Function to remove row
            window.removeRow = function (button) {
                const row = button.closest('.invoice-row');
                row.remove();
            };
        });
    </script>
</body>
</html>
