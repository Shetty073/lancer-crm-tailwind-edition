<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DigitalDetail extends Model
{
    protected $table = 'digital_details';

    protected $fillable = [
        'ref_id',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
