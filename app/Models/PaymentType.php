<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model {
    use HasFactory;

    public $timestamps = false;

    public function payment() {
        return $this->hasMany(Payment::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_income',
        'type_name',
    ];
}
