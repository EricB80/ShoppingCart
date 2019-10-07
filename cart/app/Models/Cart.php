<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Cart extends Model
{
    /**
     * Allowed for mass assignment
     *
     * @var array
     */
    protected $fillable = [
        'total',
        'taxes'
    ];

    /**
     * Create relation to items
     *
     * @return Illuminate\Eloquent\Relations\belongsToMany
     */
    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }
}