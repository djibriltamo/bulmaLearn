<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'region',
        'ville'
    ];

    public function employer()
    {
        return $this->belongsToMany(Employer::class);
    }

    public function mission()
    {
        return $this->hasMany(Mission::class);
    }
}
