<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;

class Advertisement extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters) {
        if($filters['bekijk'] ?? false) {
            $query->where('user_id', Auth::id());
        }

        if($filters['zoeken'] ?? false) {
            $query->where('title', 'like', '%'. request('zoeken') .'%');
        }

        if(($filters['periode_start']) ?? false) {
            $query->where('starting_period', '>=', request('periode_start'));
        }

        if(($filters['periode_eind']) ?? false) {
            $query->where('ending_period', '<=', request('ending_period'));
        }

        if($filters['sorteren_op'] ?? false) {
            if ($filters['sorteren_op'] == "prijs_oplopend") {
                $query->orderBy('price_in_euros', 'asc');
            } elseif ($filters['sorteren_op'] == "prijs_aflopend") {
                $query->orderBy('price_in_euros', 'desc');
            }
        }
    }

    protected $fillable = [
        'image',
        'title',
        'starting_period',
        'ending_period',
        'price_in_euros',
        'user_id',
    ];

    public function pets(): BelongsToMany
    {
        return $this->belongsToMany(Pet::class);
    }

    public function requests(): BelongsToMany
    {
        return $this->belongsToMany(PetSitter::class, 'pet_sitters_requests')->withPivot('is_accepted', 'created_at', 'updated_at');
    }

}
