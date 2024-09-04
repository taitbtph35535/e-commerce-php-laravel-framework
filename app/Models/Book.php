<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'thumbnail',
        'author',
        'publisher',
        'Publication',
        'Price',
        'Quantity',
        'Category_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'Category_id');
    }
    public function categoryCount()
    {
        return $this->belongsTo(Category::class);
    }
}
