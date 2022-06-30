<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            @include('layouts.sidebar')
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                @yield('content')
            </div>

            <footer>
                @include('layouts.footer')
            </footer>
        </div>
    </div>
    @include('layouts.script')

</body>

</html>
