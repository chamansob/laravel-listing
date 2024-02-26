<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function filterables()
    {
        return $this->morphToMany(Coach::class, 'filterable');
    }
    public function coaches()
    {
        return $this->belongsToMany(Coach::class);
    }
}
