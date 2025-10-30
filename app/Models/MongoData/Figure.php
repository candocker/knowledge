<?php

namespace ModuleKnowledge\Models\MongoData;

use Jenssegers\Mongodb\Eloquent\Model;

class Book extends Model
{
}
<?php
// app/Models/Product.php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Figure extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name',
        'price',
        'description',
        'attributes', // 嵌入式文档
        'variants',   // 数组文档
        'metadata'
    ];

    protected $casts = [
        'price' => 'float',
        'attributes' => 'array',
        'variants' => 'array',
        'metadata' => 'array',
        'is_active' => 'boolean'
    ];

    // 访问器
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // 修改器
    public function setAttributesAttribute($value)
    {
        $this->attributes['attributes'] = array_map('strtolower', $value);
    }

    // 范围查询
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopePriceRange($query, $min, $max)
    {
        return $query->whereBetween('price', [$min, $max]);
    }
}
