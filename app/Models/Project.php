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
        // * NOTE: Each project comprises of multiple modules.
        // * Each modulehas its own cost.
        // * Total project cost = cost of each module + cost of each service
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
