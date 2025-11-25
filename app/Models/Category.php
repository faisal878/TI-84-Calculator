<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'image',
        'parent_id',
        'is_active',
    ];

    /**
     * Automatically generate slug when creating.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            // Slug generate only if not manually provided
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });

        static::updating(function ($category) {
            // Agar name change ho jaye to slug bhi update kar do
            if ($category->isDirty('name') && empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }

    /**
     * Relationship: Parent category
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Relationship: Child categories
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    /**
     * Scope for active categories only
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get full SEO meta data as array
     */
    public function getSeoDataAttribute()
    {
        return [
            'title' => $this->meta_title ?? $this->name,
            'keywords' => $this->meta_keywords,
            'description' => $this->meta_description ?? Str::limit(strip_tags($this->description), 160),
        ];
    }

    /**
     * Get route key name for model binding (use slug instead of id)
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id')->where('is_published', 1);
    }
}
