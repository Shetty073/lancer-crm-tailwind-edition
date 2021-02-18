<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = [
        'amount',
        'remark',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function payment_mode()
    {
        return $this->belongsTo(PaymentMode::class);
    }

    public function digital_details()
    {
        return $this->hasOne(DigitalDetail::class);
    }

    public function cheque_details()
    {
        return $this->hasOne(ChequeDetail::class);
    }
}
