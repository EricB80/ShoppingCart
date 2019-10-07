<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        return response()->json(
            Item::all()->toArray()
        );
    }

    public function create()
    {
        $newItem = new Item($this->request->input());
        $newItem->save();

        return response()->json($newItem);
    }

    public function read($id)
    {
        $item = Item::findOrFail($id);

        return response()->json($item->toArray());
    }

    public function update($id)
    {
        $item = Item::findOrFail($id);
        $item->update($this->request->input());

        return response()->json($item->toArray());
    }
}