<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cart;

class Item extends Model
{
    /**
     * Allowed for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'taxable',
    ];

    /**
     * Create model relations
     *
     * @return void
     */
    public function carts()
    {
        return $this->belongsToMany(Cart::class);
    }
}