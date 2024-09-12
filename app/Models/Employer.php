<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'sexe',
        'phone',
        'date_both',
        'site_id'
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
