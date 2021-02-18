<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeDetails extends Model
{
    protected $table = 'cheque_details';

    protected $fillable = [
        'bank_name',
        'cheque_no',
        'status',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
