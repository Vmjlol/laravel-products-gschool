<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $amount = 10;
        $products = DB::table('products')->simplePaginate($amount);
        // return response()->json(json_decode($products), 200, [], JSON_PRETTY_PRINT);
        // $products = DB::table('products')->simplePaginate(15);

        return $products;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validation = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|min:3|max:30|unique:products,name',
                'amount' => 'required|numeric',
                'description' => 'string'
            ],
            [
                'name.required' => 'O campo nome precisa estar preenchido',
                'name.unique' => 'O nome já está sendo utilizado',
                'amount.required' => 'O campo amount precisa estar preenchido'
            ]
        );

        if ($validation->fails()) {
            // return $validation->errors()->first('name');
            // return $validation->errors()->first('amount');
            return response()->json($validation->errors(), 422);
        }

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'amount' => $request->input('amount')
        ]);

        return response()->json([
            'message' => 'Product created',
            'product' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'string|min:3|max:30|unique:products,name',
            'amount' => 'numeric',
            'description' => 'string',
            'status' => 'string|in:active,inactive'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }

        $product->fill($request->input())->update();
        return response()->json([
            'message' => 'Product updated',
            'product' => $product
        ]);
    }



    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted'
        ]);
    }
}
