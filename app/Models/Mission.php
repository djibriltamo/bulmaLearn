<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'statut',
        'site_id',
        'employer_id',
    ];

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}
