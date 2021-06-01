<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'price',
    ];

    protected $casts = [
        'price' => 'double'
    ];

    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }

    public function enquiries()
    {
        return $this->belongsToMany(Enquiry::class);
    }
}
