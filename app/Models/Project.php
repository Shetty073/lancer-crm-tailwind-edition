<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'details',
        'total_cost',
        'start_date',
        'delivery_date',
    ];

    protected $casts = [
        'total_cost' => 'double'
    ];

    protected $dates = ['start_date', 'delivery_date'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function milestones()
    {
        return $this->hasMany(Milestone::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function invoice()
    {
        return $this->hasOne(Project::class);
    }
}
