<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Coach extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function categories(): MorphToMany
    {
        return $this->morphedByMany(Categories::class, 'filterable');
    }
    public function coachthemes(): MorphToMany
    {
        return $this->morphedByMany(CoachTheme::class, 'filterable');
    }
    public function coachmethods(): MorphToMany
    {
        return $this->morphedByMany(CoachingMethod::class, 'filterable');
    }
    public function coachorgs(): MorphToMany
    {
        return $this->morphedByMany(CoachedOrganization::class, 'filterable');
    }
    public function canprovides(): MorphToMany
    {
        return $this->morphedByMany(CanProvide::class, 'filterable');
    }
    public function heldpositions(): MorphToMany
    {
        return $this->morphedByMany(HeldPosition::class, 'filterable');
    }
    public function languages(): MorphToMany
    {
        return $this->morphedByMany(Languages::class, 'filterable');
    }

    public function locations(): MorphToMany
    {
        return $this->morphedByMany(Location::class, 'filterable');
    }
    protected function uploadby(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ($value==0) ?'Admin':'User',
        );
    }
    public function user():BelongsTo
    {
        return  $this->belongsTo(User::class, 'user_id');
    }
}

