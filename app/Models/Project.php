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
        'price',
        'start_date',
        'delivery_date',
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

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }

    public function invoice()
    {
        return $this->hasOne(Project::class);
    }
}
