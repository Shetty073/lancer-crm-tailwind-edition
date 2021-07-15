<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'amount',
        'remark',
    ];

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

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
