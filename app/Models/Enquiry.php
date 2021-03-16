<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiries';

    protected $fillable = [
        'name',
        'business_name',
        'email',
        'contact_no',
        'subject',
        'is_lost',
    ];

    protected $casts = [
        'is_lost' => 'boolean'
    ];

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function follow_ups()
    {
        return $this->hasMany(FollowUp::class);
    }

    public function enquiry_status()
    {
        return $this->belongsTo(EnquiryStatus::class);
    }
}
