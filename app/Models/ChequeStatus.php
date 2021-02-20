<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChequeStatus extends Model
{
    protected $table = 'cheque_statuses';

    protected $fillable = [
        'status',
    ];

    public function chequedetails()
    {
        return $this->hasMany(ChequeDetails::class);
    }
}
