<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryStatus extends Model
{
    protected $table = 'enquiry_statuses';

    protected $fillable = [
        'status',
    ];

    public function enquiries()
    {
        return $this->hasMany(Enquiry::class);
    }
}
