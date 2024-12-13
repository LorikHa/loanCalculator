@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Loan Calculator</h1>
        <form action="{{ route('loan.calculate') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <!-- Loan Amount -->
                    <div class="mb-3">
                        <label for="loan_amount" class="form-label">@lang('messages.loan_amount')</label>
                        <input type="number" class="form-control" id="loan_amount" name="loan_amount" required>
                    </div>
                    <!-- Interest Rate -->
                    <div class="mb-3">
                        <label for="interest_rate" class="form-label">@lang('messages.interest_rate')</label>
                        <input type="number" step="0.01" class="form-control" id="interest_rate" name="interest_rate" required>
                    </div>
                    <!-- Loan Term -->
                    <div class="mb-3">
                        <label for="loan_term" class="form-label">Loan Term (in years):</label>
                        <input type="number" class="form-control" id="loan_term" name="loan_term" required>
                    </div>
                    <!-- Loan Start Date -->
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Loan Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- Extra Monthly Payment -->
                    <div class="mb-3">
                        <label for="extra_payment_monthly" class="form-label">Extra Monthly Payment (€):</label>
                        <input type="number" class="form-control" id="extra_payment_monthly" name="extra_payment_monthly" value="0">
                    </div>
                    <!-- One-Time Payment -->
                    <div class="mb-3">
                        <label for="one_time_payment" class="form-label">One-Time Payment (€):</label>
                        <input type="number" class="form-control" id="one_time_payment" name="one_time_payment" value="0">
                    </div>
                    <!-- One-Time Payment Date -->
                    <div class="mb-3">
                        <label for="one_time_payment_date" class="form-label">One-Time Payment Date:</label>
                        <input type="date" class="form-control" id="one_time_payment_date" name="one_time_payment_date">
                    </div>
                    <!-- Submit Button -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mt-4">@lang('messages.calculate')</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
