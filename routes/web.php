<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Middleware\SetLocale;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', [LoanController::class, 'index'])->name('loan.index');
    Route::post('/calculate', [LoanController::class, 'calculate'])->name('loan.calculate');

    // Add a route for changing the locale
    Route::get('locale/{lang}', function ($lang) {
        session(['locale' => $lang]); // Save the selected locale in the session
        return redirect()->back(); // Redirect back to the previous page
    });
});
