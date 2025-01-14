<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card {
            border-radius: 12px;
            border: none;
        }
        .form-label {
            font-weight: bold;
        }
        .btn-primary {
            background: linear-gradient(90deg, #28a745, #218838);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #218838, #1c7430;
        }
        .btn-success {
            background: linear-gradient(90deg, #28a745, #218838);
            border: none;
        }
        .btn-success:hover {
            background: linear-gradient(90deg, #218838, #1c7430);
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Loan Calculator" style="height: 40px;" class="me-2">
            <span>@lang('messages.loan_calculator')</span>
        </a>
        @if (!Route::is('loan.calculate'))
            <div>
                <a href="{{ url('locale/en') }}" class="btn btn-outline-primary btn-sm me-2">English</a>
                <a href="{{ url('locale/sq') }}" class="btn btn-outline-primary btn-sm">Shqip</a>
            </div>
        @endif
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
