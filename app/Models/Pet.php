<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_pic',
        'name',
        'age',
        'sex',
        'description',
        'pet_type_id',
        'user_id',
    ];

    // relationship to user
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function petType(): BelongsTo {
        return $this->belongsTo(PetType::class);
    }

    public function scopeFilter($query, array $filters) {

        if($filters['zoeken'] ?? false) {
            $query->where('name', 'like', '%'. request('zoeken') .'%')
                ->orWhere('description', 'like', '%'. request('zoeken') .'%');
        }

        if($filters['soort'] ?? false) {
            $query->where('pet_type_id', (int) request('soort'));
        }

        if($filters['geslacht'] ?? false) {
            $query->where('sex', request('geslacht'));
        }

    }
}
