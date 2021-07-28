<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use SoftDeletes;

    protected $table = 'expenses';

    protected $fillable = [
        'payee',
        'amount_paid',
        'date_of_payment',
        'remark',
    ];

    protected $casts = [
        'amount_paid' => 'double',
        'date_of_payment' => 'date',
    ];

    public function payment_mode()
    {
        return $this->belongsTo(PaymentMode::class);
    }

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
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
