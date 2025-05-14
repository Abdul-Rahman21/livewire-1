<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name', 'status', 'parent_id'
    ];

    /**
     * Get the parent category that owns the category.
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Get the category associated with the parent category.
     */
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Recursive path builder
    public function getFullPathAttribute()
    {
        return $this->parent ? $this->parent->full_path . ' > ' . $this->name : $this->name;
    }

    public static function getCategoryOptions($excludeId = null)
    {
        $categories = self::with('parent')->get();

        $buildPaths = function ($categories, $parentId = null, $prefix = '', $excludeId = null) use (&$buildPaths) {
            $options = [];
            foreach ($categories->where('parent_id', $parentId) as $category) {
                if ($excludeId && $category->id == $excludeId) continue;
                $options[$category->id] = $prefix . $category->name;
                $options += $buildPaths($categories, $category->id, $prefix . $category->name . ' > ', $excludeId);
            }
            return $options;
        };

        return $buildPaths($categories, null, '', $excludeId);
    }
}
