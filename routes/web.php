<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Middleware\SetLocale;

Route::middleware([SetLocale::class])->group(function () {
    Route::get('/', [LoanController::class, 'index'])->name('loan.index');
    Route::post('/calculate', [LoanController::class, 'calculate'])->name('loan.calculate');

    Route::get('locale/{lang}', function ($lang) {
        session(['locale' => $lang]);
        return redirect()->back();
    });
});
