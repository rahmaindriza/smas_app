<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Import class HasMany
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
 use SoftDeletes;
// Mengizinkan mass-assignment (sesuaikan dengan nama kolom yang kamu buat)
    protected $fillable = ['name'];

    /**
     * Relasi hasMany: Category ke Item
     */
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
