<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalCredit = Transaction::whereNull('deleted_at')->sum('credit') ?? 0;
        $totalDebit = Transaction::whereNull('deleted_at')->sum('debit') ?? 0;
        $balance = $totalCredit - $totalDebit;

        $credits = Transaction::whereNull('deleted_at')->whereNotNull('credit')->with('member')->orderBy('created_at', 'desc')->take(4)->get();
        $history = Transaction::whereNull('deleted_at')->with('member')->orderBy('created_at', 'desc')->take(10)->get();

        $monthlyBalances = Transaction::whereNull('deleted_at')
            ->selectRaw('MONTH(created_at) as transaction_month, SUM(credit) - SUM(debit) as net_balance')
            ->groupBy('transaction_month')
            ->orderBy('transaction_month')
            ->pluck('net_balance', 'transaction_month')
            ->toArray();


        // Ensure all 12 months are present with default value 0
        $months = array_fill(1, 12, 0);
        foreach ($monthlyBalances as $month => $balance) {
            $months[$month] = $balance;
        }

        return view('home', compact('totalCredit', 'totalDebit', 'balance', 'history', 'months', 'credits'));
    }
}
