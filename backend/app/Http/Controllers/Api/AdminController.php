<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(){
        $data= Category::all();
        // dd
        return $data;
        // return "we are in view_category";
    }

    public function add_category(Request $request){
        // $data = new category;
        // $data->category_name = $request->category;
        // $data->save();
        // return redirect()->back()->with('message','New category added Successfully');
        return "we are in add_category ";

    }

    public function destroy_category($categoryId){
        // $single = Category::findOrFail($categoryId);
        // $single -> delete();
        // // Storage::delete($singlePost->image);
        // return redirect()->back();
        return "we are in destroy_category and id sent is $categoryId";
    }

    public function view_product(){
        // $data= Category::all();
        // // dd($data);
        // return view('admin.product',['category' => $data]);
        return " we are in view all products";
    }

    public function add_product(Request $request){//Request $request
        // $product = new product;
        // $product->title = $request->title;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->category = $request->category;

        // $image = $request->file('image');
        // // $image = $request->image;
        // $imagename = time().'.'.$image->getClientOriginalExtension();
        // $request->image->move('product' , $imagename);
        // // echo Storage::putFile('product', $request->file('image'));
        // $product->image = $imagename;

        // $product->save();
        // return redirect()->back()->with('message','New Product added Successfully');

        return " we are in add new products";

    }

    public function destroy_product($productId){
        // $product = Product::findOrFail($productId);
        // $product-> delete();
        // return redirect()->back()->with('message','Product deleted Successfully');
        return "we are in destroy_product and id sent is $productId";
    }


    public function update_product(Request $request,$productId){
        // $product = Product::findOrFail($productId);
        // $product->title = $request->title;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->quantity = $request->quantity;
        // $product->category = $request->category;
        // $image = $request->file('image');
        // if($image){
        //     // $image = $request->image;
        //     $imagename = time().'.'.$image->getClientOriginalExtension();
        //     $request->image->move('product' , $imagename);
        //     // echo Storage::putFile('product', $request->file('image'));
        //     $product->image = $imagename;
        // }
        // $product->save();

        return "we are in update_product and id sent is $productId";
    }



    public function searchByProductName($productName){ //$productName
        // dd($request->pname);
        // $product = Product::findOrFail( $request->pname);
        // $searchname = $request->pname;
        // $product = Product::where('title','LIKE', "%$searchname%")->get();

        // // dd($product);
        // // dd($product->title, $product->description);
        // return view('admin.searchByProductName', ['product' => $product]);
        return "we are in searchByProductName and we want to search with  $productName";//$productName
    }

    public function view_order(){
        // $order= Product::all();
        $orders= Product::all();
        return $orders;
        return "we are in view all orders";
    }

    public function search_order($ordername){
        // $searchname = $request->pname;
        // $order = Product::where('title','LIKE', "%$searchname%")->get();
        return "we are in search_order and we want to search with  $ordername";//$productName
    }
}
