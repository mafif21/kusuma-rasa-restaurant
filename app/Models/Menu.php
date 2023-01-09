<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory, Sluggable;
    protected $fillable = ["name", "description", "image", "price", "category_id"];

    // public function categories()
    // {
    //     return $this->belongsToMany(Category::class, 'categories_menu');
    // }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('categories', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}