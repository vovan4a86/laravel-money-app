<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class ApiController extends Controller {
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
                return Payment::where('is_income', $is_income)->get();
            } else {
                return Payment::all();
            }
        }

        return Payment::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse {
        $payment = Payment::create($request->all());
        return response()->json($payment, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param Payment $payment
     * @return Payment
     */
    public function show(Payment $payment): Payment {
        return $payment;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Payment $payment
     * @return JsonResponse
     */
    public function update(Request $request, Payment $payment): JsonResponse {
        $payment->update($request->all());
        return response()->json($payment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Payment $payment
     * @return JsonResponse
     */
    public function destroy(Payment $payment): JsonResponse {
        $payment->delete();
        return response()->json(null, 204);
    }
}
