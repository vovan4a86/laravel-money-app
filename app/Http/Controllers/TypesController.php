<?php

namespace App\Http\Controllers;

use App\Models\PaymentType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Collection
     */
    public function index(Request $request): Collection {
        $is_income = $request->get('is_income');
        if(isset($is_income)) {
            if($is_income === '1' || $is_income === '0') {
                return PaymentType::where('is_income', $is_income)->get();
            } else {
                return PaymentType::all();
            }
        }

        return PaymentType::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request): JsonResponse {
        $type = PaymentType::create($request->all());
        return response()->json($type, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\PaymentType $type
     * @return \App\Models\PaymentType
     */
    public function show(PaymentType $type): PaymentType {
        return $type;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\PaymentType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, PaymentType $type): JsonResponse {
        $type->update($request->all());
        return response()->json($type);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PaymentType $type
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(PaymentType $type): JsonResponse {
        $type->delete();
        return response()->json(null, 204);
    }
}
