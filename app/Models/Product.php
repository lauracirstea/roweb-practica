<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Product
 * @package App\Models
 */
class Product extends Model
{
    protected $table = 'products';

    public $timestamps = true;

    /**
     * @var array
     */
    public $fillable = [
        'name',
        'description',
        'full_price',
        'photo',
        'quantity',
        'sale_price'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

}
