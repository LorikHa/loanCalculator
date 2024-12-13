@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Loan Amortization Schedule</h1>
        <p><strong>Loan Amount:</strong> €{{ number_format($loanAmount, 2) }}</p>
        <p><strong>Monthly Payment:</strong> €{{ number_format($monthlyPayment, 2) }}</p>
        <p><strong>Total Interest Paid:</strong> €{{ number_format($totalInterest, 2) }}</p>

        <table class="table table-striped table-hover mt-4">
            <thead class="thead-dark">
            <tr>
                <th>Payment Month</th>
                <th>Payment (€)</th>
                <th>Principal (€)</th>
                <th>Interest (€)</th>
                <th>Balance (€)</th>
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
            <button class="btn btn-primary" onclick="window.print()">Print Schedule</button>
        </div>
    </div>
@endsection
