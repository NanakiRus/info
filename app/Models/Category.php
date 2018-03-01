<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    protected  $fillable = [
        'slug',
        'title',
        'name',
        'text',
        'parent_id'
    ];

    /**
     * Возвращяет родительские категории.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Категория может иметь дочернии категории.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subcategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Рекурсивно возвращяет дерево дочерние категории.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recursiveSubcategory()
    {
        return $this->subcategory()->with('recursiveSubcategory');
    }

    /**
     * У категории может быть много постов.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }

    /**
     * У категории может быть много товаров.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
