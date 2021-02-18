<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseCategory extends Model
{
    protected $table = 'expense_categories';

    protected $fillable = [
        'name',
        'remark',
    ];

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
