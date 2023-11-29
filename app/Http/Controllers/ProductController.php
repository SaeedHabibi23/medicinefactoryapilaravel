<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

class ProductController extends Controller
{
    
    public function add_product(Request $request){
        $product =   $request->validate([
            "cat_id"  => "required",
            "product_name"  => "required",
            "ExpireDate"  => "required",
            "company_name"  => "required",
            "country_name"  => "required",
            "NumberCarton"  => "required",
            "NumberFiCarton"  => "required",
            "PriceBuy"  => "required",
            "PriceSell"  => "required",
            ]);
            $product = product::create([
            'cat_id' => $product['cat_id'],
            'product_name' => $product['product_name'],
            'ExpireDate' => $product['ExpireDate'],
            'company_name' => $product['company_name'],
            'country_name' => $product['country_name'],
            'NumberCarton' => $product['NumberCarton'],
            'NumberFiCarton' => $product['NumberFiCarton'],
            'Total' => $product['NumberCarton'] * $product['NumberFiCarton'],
            'PriceBuy' => $product['PriceBuy'],
            'PriceSell' => $product['PriceSell'],
            ]);
            return response()->json([
                'status' => true ,
                'message' => 'محصول موفقانه ذخیره شد' , 
                'data' => $product 
                ], 200);
    }
    public function show_product(){
        $product = product::join('categories' , 'categories.cat_id' , 'products.cat_id')->get();
        return response()->json($product);
    }
    public function store_update_product(Request $request , $product_id){
        $products = product::join('categories' , 'categories.cat_id' , 'products.cat_id')
        ->where('products.product_id' , '=' , $product_id)->first();
        $product =   $request->validate([
            "cat_id"  => "required",
            "product_name"  => "required",
            "ExpireDate"  => "required",
            "company_name"  => "required",
            "country_name"  => "required",
            "NumberCarton"  => "required",
            "NumberFiCarton"  => "required",
            "PriceBuy"  => "required",
            "PriceSell"  => "required",
            ]);
            $products->update([
                'cat_id' => $product['cat_id'],
                'product_name' => $product['product_name'],
                'ExpireDate' => $product['ExpireDate'],
                'company_name' => $product['company_name'],
                'country_name' => $product['country_name'],
                'NumberCarton' => $product['NumberCarton'],
                'NumberFiCarton' => $product['NumberFiCarton'],
                'Total' => $product['NumberCarton'] * $product['NumberFiCarton'],
                'PriceBuy' => $product['PriceBuy'],
                'PriceSell' => $product['PriceSell'], 
            ]);
            return response()->json([
                'status' => true ,
                'message' => 'محصول موفقانه به‌روز شد' , 
                'data' => $products
            ], 200);
    }
    public function delete_product($product_id){
        $products = product::join('categories' , 'categories.cat_id' , 'products.cat_id')
        ->where('products.product_id' , '=' , $product_id)->first();
        $products->delete();
        return response()->json([
            'status' => true,
            'message' => 'محصول موفقانه حذف شد',
        ], 200);
    }


}
