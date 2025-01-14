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
                <div id="ad-container" class="card p-3 shadow-sm text-center">
                    <img src="https://teb-kos.com/wp-content/uploads/2023/10/TEB_KrediHipotekare_WEB.jpg"
                         alt="Kredi Hipotekare"
                         class="img-fluid mb-3"
                         style="max-height: 200px; object-fit: cover;">
                    <h5 id="ad-title">Pavarësohu përgjithmonë</h5>
                    <p id="ad-description">Merr kredi hipotekare me maturitet deri në 180 muaj!</p>
                    <a id="ad-link" href="https://teb-kos.com/offers/pavaresohu-pergjithmone-merr-kredi-hipotekare-me-maturitet-deri-ne-180-muaj/"
                       class="btn btn-outline-primary btn-sm" target="_blank">
                        Learn More
                    </a>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    @if (App::getLocale() == 'en')
                        @include('loanTypes.loans_en')
                    @else
                        @include('loanTypes.loans_sq')
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    const ads = [
        {
            img: "https://teb-kos.com/wp-content/uploads/2023/10/TEB_KrediHipotekare_WEB.jpg",
            title: "Pavarësohu përgjithmonë TEB",
            description: `
            <strong>Merr kredi hipotekare me maturitet deri në 180 muaj!</strong><br><br>
            <strong>Kush mund të aplikojë për kredi?</strong><br>
            Të gjithë pagëmarrësit e institucioneve shtetërore, kompanive publike, sektorit privat dhe klientët me të hyra nga qeraja.<br><br>
            <strong>Qëllimi i kredisë:</strong><br>
            Blerje e shtëpisë apo banesës.
        `,
            link: "https://teb-kos.com/offers/pavaresohu-pergjithmone-merr-kredi-hipotekare-me-maturitet-deri-ne-180-muaj/"
        },
        {
            img: "https://bkt-ks.com/content/2019/03/happy-home.jpg",
            title: "Kredite për Shtëpi BKT",
            description: `
            <strong>Shuma maksimale e kredisë:</strong> 500,000 EUR<br><br>
            <strong>Afati maksimal i kthimit të kredisë:</strong> 180 muaj (15 vite)<br><br>
            <strong>Pjesëmarrja e klientit:</strong> 20%<br><br>
            <strong>Kush mund të aplikojë?</strong><br>
            Punëtorët e sektorit publik dhe kompanive private.<br>
            Klientët me të ardhura të justifikuara (paga përmes bankave, qeraja, të ardhurat nga biznesi për të vetë-punësuarit).
        `,
            link: "https://bkt-ks.com/individet/kredite/kredi-per-shtepi/"
        },
        {
            img: "https://www.raiffeisen-kosovo.com/content/dam/rbi/retail/eu/xk/mortgage/Mortgage-2%20-%20Raiffeisen%201.jpg.transform.rbistagetablan2x.jpg",
            title: "Bëje shtëpinë e ëndrrave realitet! Raiffeisen",
            description: `
            <strong>Kredi hipotekare deri në 400,000 euro</strong><br><br>
            <strong>Afati i kthimit:</strong> Deri në 25 vjet<br><br>
            <strong>Pa shpenzime administrative</strong><br><br>
            <strong>Normë efektive e interesit prej 3.87%</strong><br><br>
            Për më shumë informacione, vizitoni faqen tonë.
        `,
            link: "https://www.raiffeisen-kosovo.com/sq/individe/produktet/kredite-hipotekare/kredite-hipotekare.html"
        },
        {
            img: "https://bankacredins-ks.com/wp-content/uploads/2020/08/Credins-Bank-Kosova-Kredia-Hipotekore-1500x290px.jpg",
            title: "Kredi Hipotekore nga Credins Bank",
            description: `
            <strong>Financim për blerjen e pasurive të paluajtshme</strong><br><br>
            <strong>Avantazhet:</strong><br>
            - Blini apo zgjeroni banesën tuaj sipas nevojave familjare<br>
            - Menaxhoni të ardhurat tuaja në mënyrë afatgjatë<br><br>
            Për më shumë detaje, vizitoni faqen tonë.
        `,
            link: "https://bankacredins-ks.com/individe/produkte-dhe-sherbime/financime/kredi-hipotekore/"
        }
    ];

    let currentAdIndex = 0;

    function rotateAd() {
        const adImage = document.querySelector("#ad-container img");
        const adTitle = document.querySelector("#ad-title");
        const adDescription = document.querySelector("#ad-description");
        const adLink = document.querySelector("#ad-link");

        if (!adImage || !adTitle || !adDescription || !adLink) {
            console.error("Ad container elements not found. Check your HTML structure.");
            return;
        }

        const ad = ads[currentAdIndex];

        adImage.src = ad.img;
        adTitle.textContent = ad.title;
        adDescription.innerHTML = ad.description; // Përdorni innerHTML për të mbështetur HTML në përshkrim
        adLink.href = ad.link;
        currentAdIndex = (currentAdIndex + 1) % ads.length;
    }

    // Initialize the first ad and set up interval rotation
    document.addEventListener("DOMContentLoaded", () => {
        rotateAd(); // Show the first ad immediately
        setInterval(rotateAd, 10000); // Rotate ads every 10 seconds
    });
</script>
