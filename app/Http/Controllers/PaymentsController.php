<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PaymentsController extends Controller
{
    public function index() {
        $all = DB::table('payments')
            ->join('payment_types', 'payments.type_id', '=', 'payment_types.t_id')
            ->orderByDesc('updated_at')
            ->get();

//        dd($all);


        $sum = 0;
        foreach ($all as $one) {
            if($one->is_income === 0) {
                $sum -= $one->amount;
            } else {
                $sum += $one->amount;
            }
        }

        return view('welcome', [
            'all' => $all,
            'sum' => $sum
        ]);
    }

    public function getAllPayments($type) {
        if($type === 'incomes') $paymentType = 1;
        if($type === 'outcomes') $paymentType = 0;

        if(!isset($paymentType)) {
            echo 'Неправильный параметр записи';
        } else {
            $pays = DB::table('payments')
                ->where('payments.is_income', '=', $paymentType)
                ->join('payment_types', 'payments.type_id', '=', 'payment_types.t_id')
                ->orderByDesc('updated_at')
                ->get();

            $sum = 0;
            foreach ($pays as $pay) {
                $sum += $pay->amount;
            }

            return view('pays', [
                'type' => $paymentType,
                'pays' => $pays,
                'sum' => $sum
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(Request $request): View {
        $type = (int)$request->get('type') ?? 0;
        if($type !== 1) $type = 0;

        $type_names = DB::table('payments')
            ->where('payments.is_income', '=', $type)
            ->join('payment_types', 'payments.type_id', '=', 'payment_types.t_id')
            ->select('type_id', 'type_name')
            ->distinct()
            ->get();


        return view('add', [
                'type' => $type,
                'type_names' => $type_names
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)  {
        $validatedData = $request->validate([
            'is_income' => 'required',
            'type_id' => 'required',
            'amount' => 'required',
            'comment' => 'required|max:255',
        ]);

        $validatedData += ['created_at' => now()];
        $validatedData += ['updated_at' => now()];

        DB::table('payments')->insertGetId($validatedData);
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Request $request, int $id) {
        $type = $request->get('type');

        $payment = DB::table('payments')
            ->where('id', '=', $id)
            ->join('payment_types', 'payments.type_id', '=', 'payment_types.t_id')
            ->orderByDesc('updated_at')
            ->get()[0];

        if ($type !== null) {
            $payment->is_income = $type;
        }

        $type_names = DB::table('payments')
            ->where('payments.is_income', '=', $payment->is_income)
            ->join('payment_types', 'payments.type_id', '=', 'payment_types.t_id')
            ->select('type_id', 'type_name')
            ->distinct()
            ->get();

        return view('edit', [
            'payment' => $payment,
            'type_names' => $type_names
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(Request $request, int $id)
    {
//        dd($request->all());

        $validatedData = $request->validate([
            'is_income' => 'required',
            'type_id' => 'required',
            'amount' => 'required',
            'comment' => 'required|max:255',
        ]);
        $validatedData += ['updated_at' => now()];

        DB::table('payments')
            ->where('id', $id)
            ->update($validatedData);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id) {
        DB::table('payments')->where('id', '=', $id)->delete();
        return redirect('/');
    }

}
