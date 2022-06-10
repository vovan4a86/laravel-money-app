<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
    use HasFactory;

    public function paymentType() {
        return $this->belongsTo(PaymentType::class);
    }

    protected $fillable = [
        'is_income',
        'type_id',
        'amount',
        'comment',
    ];
}
