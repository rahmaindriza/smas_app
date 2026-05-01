<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'item_kode',
        'name_item',
        'stock',
        'brand',
        'description',
        'unit',
        'image'
    ];
    /**
     * Relasi: Item ke Category
     */
    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: function (mixed $value, array $attributes) {
                // Kita ambil item_kode dan name_item
                $code = $attributes['item_kode'] ?? '';
                $name = $attributes['name_item'] ?? '';
                return "{$code} - {$name}";
            },
        );
    }

    /**
     * 4. Mutator: item_kode otomatis huruf KAPITAL (Poin 4 Tugas 3)
     */
    protected function itemKode(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => strtoupper($value),
        );
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
