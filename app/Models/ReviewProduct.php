<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewProduct extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = 'review_product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'product_id',
        'star',
        'comment',
        'created_date',
        'created_by'
    ];
}

