<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Loan Calculator" style="height: 40px;">
                    Loan Calculator
                </a>
                <div class="text-end">
                    <a href="{{ url('locale/en') }}" class="btn btn-outline-primary btn-sm">English</a>
                    <a href="{{ url('locale/sq') }}" class="btn btn-outline-primary btn-sm">Shqip</a>
                </div>
            </div>
        </nav>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
