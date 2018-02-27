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
     * Категория может иметь дочернии категории.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function category()
    {
        return $this->hasMany(self::class);
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
}
