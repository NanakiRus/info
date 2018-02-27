<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'slug',
        'name',
        'title',
        'h1',
        'text',
        'category_id'
    ];

    /**
     * У товара может быть несколько изображений.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    /**
     * У товара может быть несколько отзывов.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    public function productOptions()
    {
        return $this->belongsToMany(ProductOption::class,
            'product_product_options', 'product_option_id', 'product_id');
    }
}
