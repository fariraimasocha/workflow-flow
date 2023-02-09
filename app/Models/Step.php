<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'handler',
        'status',
        
    ];
    public function projects()
    {
        return $this->belongsToMany(Project::class,'project_step');
    }
}
