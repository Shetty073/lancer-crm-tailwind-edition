<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Milestone extends Model
{
    protected $table = 'milestones';

    protected $fillable = [
        'name',
        'remark',
        'delivery_date',
    ];

    protected $dates = ['delivery_date'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
