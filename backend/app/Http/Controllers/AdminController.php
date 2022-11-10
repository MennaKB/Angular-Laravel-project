<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data= Category::all();
        // dd($data);
        return view('admin.category',['category' => $data]);
    }

    public function add_category(Request $request){
        $data = new category;
        // dd($request->category);
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message','New category added Successfully');
        // dd($data);
        // dd($data->category_name);
    }

    public function destroy_category($categoryId){
        $single = Category::findOrFail($categoryId);
        $single -> delete();
        // Storage::delete($singlePost->image);
        return redirect()->back();
        // dd($singlePost);

        // dd("we are in destroy");
    }

    public function view_product(){
        $data= Category::all();
        // dd($data);
        return view('admin.product',['category' => $data]);
    }

    public function add_product(Request $request){
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
        return redirect()->back()->with('message','New Product added Successfully');

    }

    public function show_product(){
        $data= Product::all();
        return view('admin.showAllProducts',['product' => $data]);
    }

    public function edit_product($productId){
        $product = Product::findOrFail($productId);
        $category = Category::all();
        // return view('admin.product',['category' => $data]);
        return view('admin.updateProduct', ['product' => $product, 'category' => $category]);
    }

    public function update_product(Request $request,$productId){
        $product = Product::findOrFail($productId);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;
        $image = $request->file('image');
        if($image){
            // $image = $request->image;
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product' , $imagename);
            // echo Storage::putFile('product', $request->file('image'));
            $product->image = $imagename;
        }
        $product->save();

        return redirect()->back()->with('message','Product updated Successfully');
    }
    public function destroy_product($productId){
        $product = Product::findOrFail($productId);
        $product-> delete();
        return redirect()->back()->with('message','Product deleted Successfully');
    }

    public function view_searchByProductName(){

        return view('admin.searchByProductName');

    }


    public function searchByProductName(Request $request){
        // dd($request->pname);
        // $product = Product::findOrFail( $request->pname);
        $searchname = $request->pname;
        $product = Product::where('title','LIKE', "%$searchname%")->get();

        // dd($product);
        // dd($product->title, $product->description);
        return view('admin.searchByProductName', ['product' => $product]);
    }

    public function view_order(){
        $order= Product::all();
        return view('admin.viewOrder',['order' => $order]);
    }

    public function search_order(Request $request){
        $searchname = $request->pname;
        $order = Product::where('title','LIKE', "%$searchname%")->get();

        return view('admin.searchOrder',['order' => $order]);
    }

}
