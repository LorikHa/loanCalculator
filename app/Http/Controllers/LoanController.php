<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function index()
    {
        return view('   index');
    }

    public function calculate(Request $request)
    {
        $request->validate([
            'loan_amount' => 'required|numeric|min:1',
            'interest_rate' => 'required|numeric|min:0',
            'loan_term' => 'required|numeric|min:1',
            'start_date' => 'required|date',
            'one_time_payment' => 'nullable|numeric|min:0',
            'one_time_payment_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        $loanAmount = $request->loan_amount;
        $interestRate = $request->interest_rate / 100;
        $loanTerm = $request->loan_term * 12; // Convert years to months
        $monthlyRate = $interestRate / 12;

        $extraPaymentMonthly = $request->extra_payment_monthly ?? 0;
        $oneTimePayment = $request->one_time_payment ?? 0;
        $startDate = Carbon::parse($request->start_date);
        $oneTimePaymentDate = $request->one_time_payment_date ? Carbon::parse($request->one_time_payment_date) : null;

        $oneTimePaymentMonth = $oneTimePaymentDate ? $startDate->diffInMonths($oneTimePaymentDate) + 1 : null;
        $oneTimePaymentMonth = $oneTimePaymentMonth ? (int) $oneTimePaymentMonth : null;

        $monthlyPayment = $this->calculateMonthlyPayment($monthlyRate, $loanTerm, $loanAmount);

        $balance = $loanAmount;
        $schedule = [];
        $totalInterest = 0;

        for ($month = 1; $month <= $loanTerm; $month++) {
            $interest = $balance * $monthlyRate;
            $principal = $monthlyPayment - $interest;

            // Apply extra monthly payments
            if ($month >= 1) {
                $balance -= $extraPaymentMonthly;
            }

            // Apply one-time payment
            if ($month == $oneTimePaymentMonth) {
                $balance -= $oneTimePayment;
            }

            $balance -= $principal;
            $totalInterest += $interest;

            $schedule[] = [
                'month' => $month,
                'date' => $startDate->copy()->addMonths($month - 1)->format('M Y'),
                'payment' => $monthlyPayment + $extraPaymentMonthly,
                'interest' => $interest,
                'principal' => $principal,
                'balance' => max($balance, 0),
            ];

            if ($balance <= 0) {
                break;
            }
        }

        return view('loan.result', [
            'schedule' => $schedule,
            'totalInterest' => $totalInterest,
            'loanAmount' => $loanAmount,
            'monthlyPayment' => $monthlyPayment,
        ]);
    }

    private function calculateMonthlyPayment($rate, $nper, $pv)
    {
        if ($rate === 0) {
            return $pv / $nper;
        }
        return ($pv * $rate) / (1 - pow(1 + $rate, -$nper));
    }
}
