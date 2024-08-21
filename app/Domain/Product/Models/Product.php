<?php

namespace App\Domain\Product\Models;

use App\Domain\Category\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $table = 'products';

    public const MODEL_NAME = 'products';

    protected $fillable = [
        'title',
        'description',
        'stock',
        'images',
        'category_id',
        'discount_percentage',
        'rating',
        'thumbnail',
        'price'
    ];

    protected $casts = [
        'images' => 'array'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
