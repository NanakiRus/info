<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $table = 'product_reviews';

    protected $fillable = [
        'author',
        'votes',
        'text',
        'product_id'
    ];

    /**
     * Отзыв может относится к 1 товару.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
