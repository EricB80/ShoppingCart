<?php

/**
 * Standard CRUD Controller
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Http\JsonResponse;

class CartController extends Controller
{
    /**
     * the request
     *
     * @var Illuminate\Http\Request
     */
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Add new cart
     *
     * @return JsonResponse
     */
    public function create() : JsonResponse
    {
        $cart = Cart::create($this->request->input());
        return response()->json($cart);
    }

    public function update($id) : JsonResponse
    {
        $cart = Cart::findOrFail($id);

        //remove all items from cart, and reattach items -- brute force method
        $items = $cart->items;
        $cart->items()->detach($items->pluck('id'));
 
        foreach($this->request->input('items') as $item) {
            $cart->items()->attach($item['id'], ['quantity' => $item['quantity']]);
        }
        
        return response()->json($cart);
    }

    public function read($id) : JsonResponse
    {
        $cart = Cart::with('items')->findOrFail($id);
        
        return response()->json([
            'cart' => $cart
        ]);
    }
}