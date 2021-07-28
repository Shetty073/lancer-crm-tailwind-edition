<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use SoftDeletes;

    protected $table = 'payments';

    protected $fillable = [
        'payer',
        'amount',
        'remark',
        'due_date',
        'date_of_payment',
    ];

    protected $casts = [
        'amount' => 'double',
        'due_date' => 'date',
        'date_of_payment' => 'date',
    ];

    public function payment_mode()
    {
        return $this->belongsTo(PaymentMode::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    // public function digital_details()
    // {
    //     return $this->hasOne(DigitalDetail::class);
    // }

    // public function cheque_details()
    // {
    //     return $this->hasOne(ChequeDetail::class);
    // }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function lastEditedBy()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
