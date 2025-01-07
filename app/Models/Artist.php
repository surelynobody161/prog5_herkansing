<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{

    protected $table = 'artists';
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'created_by',
        'art',
        'is_alive',
        'created_at',
        'updated_at'
    ];

    public function arts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Art::class, 'artist_id');
    }
}
