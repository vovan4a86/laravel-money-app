<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Collection|Income[]
     */
    public function index()
    {
        return Income::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse  {
        $validatedData = $request->validate([
            'type_id' => 'required',
            'comment' => 'required|max:255',
            'amount' => 'required',
        ]);
        $income = Income::create($validatedData);
        return \response()->json($income, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Income $income
     * @return Income
     */
    public function show(Income $income): Income {

        return $income;

//        return DB::table('incomes')
//            ->join('income_types', 'incomes.type_id', '=', 'income_types.id')
//            ->where('incomes.id', '=', $id)
//            ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        return 'SHOW EDIT';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Income $income): JsonResponse
    {
        $validatedData = $request->validate([
            'type_id' => 'required',
            'comment' => 'required|max:255',
            'amount' => 'required',
        ]);
        $income->update($validatedData);
        return \response()->json($income, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Income $income): JsonResponse {
        $income->delete();

        return \response()->json(null, 204);
    }
}
