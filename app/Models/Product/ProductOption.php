<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table = 'product_options';

    protected $fillable = [
        'name',
        'description'
    ];

    public function products()
    {
        $this->belongsToMany(Product::class,
            'product_product_options', 'product_id', 'product_option_id');
    }
}
