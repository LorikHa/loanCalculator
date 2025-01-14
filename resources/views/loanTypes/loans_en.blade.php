@extends('layouts.app')

@section('head')
    <title>@lang('messages.loan_calculator') - Llogaritës i Kredisë</title>
    <meta name="description" content="Llogaritës i kredisë që ju ndihmon të llogaritni pagesat mujore bazuar në shumën e huasë, normën e interesit, dhe afatin.">
    <meta name="keywords" content="llogaritës i kredisë, loan calculator, kredi hipotekare, llogaritje kredie">
    <meta name="author" content="Llogaritës i Kredisë">
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-9">
                <div class="card p-4 shadow-sm">
                    <h1 class="mb-4 text-success">@lang('messages.loan_calculator')</h1>
                    <form action="{{ route('loan.calculate') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Loan Amount -->
                                <div class="mb-3">
                                    <label for="loan_amount" class="form-label">@lang('messages.loan_amount')</label>
                                    <input type="text" class="form-control" id="loan_amount" name="loan_amount"
                                           required oninput="formatNumber(this)">
                                </div>
                                <!-- Interest Rate -->
                                <div class="mb-3">
                                    <label for="interest_rate" class="form-label">@lang('messages.interest_rate')</label>
                                    <input type="number" step="0.01" class="form-control" id="interest_rate" name="interest_rate" required>
                                </div>
                                <!-- Loan Term -->
                                <div class="mb-3">
                                    <label for="loan_term" class="form-label">@lang('messages.loan_term')</label>
                                    <input type="number" class="form-control" id="loan_term" name="loan_term" required>
                                </div>
                                <!-- Loan Start Date -->
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">@lang('messages.start_date')</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Extra Monthly Payment -->
                                <div class="mb-3">
                                    <label for="extra_payment_monthly" class="form-label">@lang('messages.extra_payment_monthly')</label>
                                    <input type="text" class="form-control" id="extra_payment_monthly" name="extra_payment_monthly"
                                           value="0" oninput="formatNumber(this)">
                                </div>
                                <!-- One-Time Payment -->
                                <div class="mb-3">
                                    <label for="one_time_payment" class="form-label">@lang('messages.one_time_payment')</label>
                                    <input type="text" class="form-control" id="one_time_payment" name="one_time_payment"
                                           value="0" oninput="formatNumber(this)">
                                </div>
                                <!-- One-Time Payment Date -->
                                <div class="mb-3">
                                    <label for="one_time_payment_date" class="form-label">@lang('messages.one_time_payment_date')</label>
                                    <input type="date" class="form-control" id="one_time_payment_date" name="one_time_payment_date">
                                </div>
                                <!-- Submit Button -->
                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">@lang('messages.calculate')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Advertisement Section -->
            <div class="col-lg-3">
                <div class="card p-3 shadow-sm text-center">
                    <img src="https://teb-kos.com/wp-content/uploads/2023/10/TEB_KrediHipotekare_WEB.jpg"
                         alt="Kredi Hipotekare"
                         class="img-fluid mb-3"
                         style="max-height: 300px; object-fit: cover;">
                    <h5>Pavarësohu përgjithmonë</h5>
                    <p>Merr kredi hipotekare me maturitet deri në 180 muaj!</p>
                    <a href="https://teb-kos.com/offers/pavaresohu-pergjithmone-merr-kredi-hipotekare-me-maturitet-deri-ne-180-muaj/"
                       class="btn btn-outline-primary btn-sm" target="_blank">
                        Learn More
                    </a>
                </div>
                <div class="card p-3 shadow-sm text-center">
                    <img src="https://bkt-ks.com/content/2019/03/happy-home.jpg"
                         alt="Kredi Hipotekare"
                         class="img-fluid mb-3"
                         style="max-height: 300px; object-fit: cover;">
                    <h5>Kreditë për Shtëpi</h5>
                    <p>Shuma maksimale e kredisë: 500,000 EUR</p>
                    <a href="https://teb-kos.com/offers/pavaresohu-pergjithmone-merr-kredi-hipotekare-me-maturitet-deri-ne-180-muaj/"
                       class="btn btn-outline-primary btn-sm" target="_blank">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function formatNumber(input) {
            const value = input.value.replace(/,/g, '');
            if (!isNaN(value)) {
                input.value = parseFloat(value).toLocaleString('en');
            } else {
                input.value = input.value.slice(0, -1);
            }
        }
    </script>
@endsection
