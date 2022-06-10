<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index() {

    }

    public function getAllIncome() {
        $incomes = DB::table('payments')
            ->where('is_income', '=', 1)
            ->get();

        $sum = 0;
        foreach ($incomes as $inc) {
            $sum += $inc->amount;
        }

        return view('incomes', [
            'incomes' => $incomes,
            'sum' => $sum
        ]);
    }
    public function getAllOutcome() {
        $incomes = DB::table('payments')
            ->where('is_income', '=', 0)
            ->get();

        $sum = 0;
        foreach ($incomes as $inc) {
            $sum += $inc->amount;
        }

        return view('incomes', [
            'incomes' => $incomes,
            'sum' => $sum
        ]);
    }

    public function addIncomeView() {
        $income_types = DB::table('income_types')->get();
        return view('add', [
            'type' => 'income',
            'income_types' => $income_types
        ]);
    }

    public function addIncome(Request $request) {

        $validatedData = $request->validate([
            'type_id' => 'required',
            'amount' => 'required',
            'comment' => 'required|max:255',
        ]);

        Income::create($validatedData);

        return redirect('/');
    }
}
