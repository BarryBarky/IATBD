<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PetSittersImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'number',
        'pet_sitter_id'
    ];

    public function images(): HasOne
    {
        return $this->hasOne(PetSitter::class);
    }
}
