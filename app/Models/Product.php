<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';

    // for user to fill
    protected $fillable = [
        'barcode',
        'category',
        'description',
        'price',
        'availQuantity'
    ];

    public $timestamps = true; 
}
