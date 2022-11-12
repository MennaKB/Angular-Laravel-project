<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category(){
        $data= Category::all();
        return new CategoryResource($data);
    }

    public function add_category(Request $request){
        $data = new category;
        $data->category_name = $request->category;
        $result=$data->save();
        // return "we are in add_category ";
        // return 'done + $data';
        if($result){
            return ["result" => "Category Added"];
        }else{
            return
            ["result"=> "can not add category"];
        }
    }

    public function destroy_category($categoryId){
        $data = Category::findOrFail($categoryId);
        $result=$data -> delete();
        // return "we are in destroy_category and id sent is $categoryId";
        // return 'done + $data';
        if($result){
            return ["result" => "Deleted Category"];
        }else{
            return
            ["result"=> "can not delete category"];
        }
    }

    public function view_product(){
        $data= Product::all();
        // return " we are in view all products";
        return new ProductResource($data);
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

        $result = $product->save();
        if($result){
            return ["result" => "Added Product successfully"];
        }else{
            return
            ["result"=> "can not add product"];
        }
        // return new ProductResource($product);
        // return " we are in add new products";

    }

    public function destroy_product($productId){
        $product = Product::findOrFail($productId);
        $result = $product-> delete();
        // return "we are in destroy_product and id sent is $productId";
        if($result){
            return ["result" => "Deleted product"];
        }else{
            return
            ["result"=> "can not delete product"];
        }
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
        return new ProductResource($product);

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
            return ["result" => "Updated order status"];
        }else{
            return
            ["result"=> "can not update order"];
        }
        // return $order;
    }
}
