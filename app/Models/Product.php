<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'material',
        'description',
        'price',
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class);
    }
}
