<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = [
        'name',
        'amount_paid',
    ];

    public function expense_category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
