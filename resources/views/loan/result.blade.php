@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h1 class="mb-4 text-success">@lang('messages.loan_amortization_schedule')</h1>
            <p><strong>@lang('messages.loan_amount'):</strong> €{{ number_format($loanAmount, 2) }}</p>
            <p><strong>@lang('messages.monthly_payment'):</strong> €{{ number_format($monthlyPayment, 2) }}</p>
            <p><strong>@lang('messages.total_interest_paid'):</strong> €{{ number_format($totalInterest, 2) }}</p>

            <table class="table table-bordered table-hover mt-4">
                <thead class="table-dark">
                <tr>
                    <th>@lang('messages.payment_month')</th>
                    <th>@lang('messages.payment') (€)</th>
                    <th>@lang('messages.principal') (€)</th>
                    <th>@lang('messages.interest') (€)</th>
                    <th>@lang('messages.balance') (€)</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($schedule as $row)
                    <tr>
                        <td>{{ $row['date'] }}</td>
                        <td>{{ number_format($row['payment'], 2) }}</td>
                        <td>{{ number_format($row['principal'], 2) }}</td>
                        <td>{{ number_format($row['interest'], 2) }}</td>
                        <td>{{ number_format($row['balance'], 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="text-center mt-4">
                <button class="btn btn-success btn-lg" onclick="window.print()">@lang('messages.print_schedule')</button>
            </div>
        </div>
    </div>
@endsection
