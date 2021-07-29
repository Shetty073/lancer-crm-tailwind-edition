<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    use SoftDeletes;

    protected $table = 'bank_accounts';

    protected $fillable = [
        'name',
        'last_balance',
        'current_balance',
    ];

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }
}
