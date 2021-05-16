<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeDetail extends Model
{
    protected $table = 'cheque_details';

    protected $fillable = [
        'bank_name',
        'cheque_no',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function cheque_status()
    {
        return $this->belongsTo(ChequeStatus::class);
    }
}
