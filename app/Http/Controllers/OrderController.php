<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class OrderController extends Controller
{
    public function show($id)
    {
        $order = DB::table('orders')->where('id', $id)->first();

        if ($order) {
            return response()->json($order);
        } else {
            return response()->json(['error' => 'Order not found'], 404);
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'product_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $orderId = DB::table('orders')->insertGetId($validatedData);

        $order = DB::table('orders')->where('id', $orderId)->first();

        return response()->json($order, 201);
    }
}
