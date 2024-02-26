<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoachTheme extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function filterables()
    {
        return $this->morphToMany(Coach::class, 'filterable');
    }
}
