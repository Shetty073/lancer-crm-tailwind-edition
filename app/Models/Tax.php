<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'taxes';

    protected $fillable = [
        'name',
        'tax_percent',
    ];

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
