<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PetSitter extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(PetSittersImage::class);
    }

    public function advertisements(): BelongsToMany
    {
        return $this->belongsToMany(Advertisement::class, 'pet_sitters_requests')->withPivot('is_accepted', 'created_at', 'updated_at');
    }
}
