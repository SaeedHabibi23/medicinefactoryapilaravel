<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriController extends Controller
{
    public function add_categories(Request $request){
        $Categories =   $request->validate([
            "cat_name"  => "required",
            ]);
            $Categories = Categories::create([
            'cat_name' => $Categories['cat_name'],
            ]);
            return response()->json([
                'status' => true ,
                'message' => 'کتگوری موفقانه ذخیره شد' , 
                'data' => $Categories 
                ], 200);
    }
    public function show_categories(){
        $Categories = Categories::all();
        return response()->json($Categories);
    }
    public function store_update_categories(Request $request , $cat_id){
        $Categories = Categories::where('cat_id' , '=' , $cat_id)->first();
        $Categorieis =   $request->validate([
            "cat_name"  => "required",
            ]);

            $Categories->update([
                'cat_name' => $Categorieis['cat_name'],  
            ]);
            
        return response()->json([
            'status' => true ,
            'message' => 'کتگوری موفقانه به‌روز شد' , 
            'data' => $Categories
        ], 200);
    }
    public function delete_categories($cat_id){
        $Categories = Categories::where('cat_id' , '=' , $cat_id)->first();
        $Categories->delete();
        return response()->json([
            'status' => true,
            'message' => 'کتگوری موفقانه حذف شد',
        ], 200);
    }
}
