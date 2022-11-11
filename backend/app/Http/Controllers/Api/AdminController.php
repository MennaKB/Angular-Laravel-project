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
        return $data;
    }

    public function add_category(Request $request){
        $data = new category;
        $data->category_name = $request->category;
        $data->save();
        // return "we are in add_category ";
        // return 'done + $data';
    }

    public function destroy_category($categoryId){
        $data = Category::findOrFail($categoryId);
        $data -> delete();
        // return "we are in destroy_category and id sent is $categoryId";
        // return 'done + $data';
    }

    public function view_product(){
        $data= Product::all();
        // return " we are in view all products";
        return $data;
    }

    public function add_product(Request $request){//Request $request
        $product = new product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        $image = $request->file('image');
        // $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product' , $imagename);
        // echo Storage::putFile('product', $request->file('image'));
        $product->image = $imagename;

        $product->save();
        // return redirect()->back()->with('message','New Product added Successfully');

        return $product;
        return " we are in add new products";

    }

    public function destroy_product($productId){
        $product = Product::findOrFail($productId);
        $product-> delete();
        // return "we are in destroy_product and id sent is $productId";
    }


    public function update_product(Request $request){
        $product = Product::findOrFail($request->id);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->file('image');
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product' , $imagename);
            $product->image = $imagename;
        }
        $result=$product->save();
        if($result){
            return ["result" => "Updated"];
        }else{
            return
            ["result"=> "Not Updated"];
        }

        // return "we are in update_product and id sent is $productId";
        // return $product;
    }



    public function searchByProductName($searchname){
        // $product = Product::findOrFail( $request->pname);
        // $searchname = $request->proudctname;
        $product = Product::where('title','LIKE', "%$searchname%")->get();
        //return "we are in searchByProductName and we want to search with  $productName";
        return $product;

    }

    public function view_order(){
        // $order= Product::all();
        $orders= Product::all();
        return $orders;
        // return "we are in view all orders";
    }

    public function search_order($searchname){
        // $searchname = $request->pname;
        $order = Product::where('title','LIKE', "%$searchname%")->get();
        // $order = Product::->where(['title'=>$searchname]);
        // return "we are in search_order and we want to search with  $ordername";//$productName
        return $order;
    }

    public function update_order(Request $request){
        $order = Product::findOrFail($request->id);
        $result = $order->update([
            "price" => $request->status
        ]);

        if($result){
            return ["result" => "Updated"];
        }else{
            return
            ["result"=> "Not Updated"];
        }
        // return $order;
    }
}
