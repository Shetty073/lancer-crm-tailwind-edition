<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUp extends Model
{
    protected $table = 'follow_ups';

    protected $fillable = [
        'date',
        'time',
        'remark',
        'outcome',
    ];

    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class);
    }
}
