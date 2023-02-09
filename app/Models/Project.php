<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Project extends Model
{
    use HasFactory;
    use Searchable;
    
    protected $fillable =[
        'name',
        'description',
        'company',
        'bill',
        'status',
    ];
    public function steps()
    {
        return $this->belongsToMany(Step::class,'project_step');
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'status' => $this->email,
            'company' => $this->company,
            'description' => $this->description,
        ];
    }
}

