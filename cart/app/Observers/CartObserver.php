<?php

namespace App\Observers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Support\Collection;

class CartObserver
{
    /**
     * Calculate the total price of items in the cart
     *
     * @param Cart $cart
     * @return void
     */
    private function calc_total(Cart $cart)
    {
        $prices = $cart->items->pluck('price')->toArray();
        $cart->total = array_sum($prices);
        $cart->save();
    }

    /**
     * calculate the total taxes of items in the cart
     *
     * @param Cart $cart
     * @return void
     */
    private function calc_total_taxes(Cart $cart)
    {
        $taxes = 0;
        foreach($cart->items as $item){
            if($item->taxable){
                $itemTax = $item->price * .15;
                $taxes = $taxes + $itemTax;
            }
        }
        $cart->taxes = $taxes;
        $cart->save();
    }

    public function updating(Cart $cart)
    {
        $this->calc_total($cart);
        $this->calc_total_taxes($cart);
    }

    public function updated(Cart $cart)
    {
        $this->calc_total($cart);
        $this->calc_total_taxes($cart);
    }
}