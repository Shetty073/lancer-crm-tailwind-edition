<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = [
        'total_amount',
        'amount_paid',
        'is_fully_paid',
    ];

    protected $casts = [
        'is_fully_paid' => 'boolean',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function tax()
    {
        return $this->belongsTo(Tax::class);
    }
}
