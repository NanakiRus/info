<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';

    protected $fillable = [
        'name',
        'type',
        'main',
        'product_id'
    ];

    /**
     * Изображение может принадлежать к 1 товару.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    /**
     * Проверка главное ли изображение.
     *
     * @return bool
     */
    public function isMain()
    {
        return (bool) $this->main;
    }
}
