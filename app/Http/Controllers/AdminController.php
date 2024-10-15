<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();

        return view('admin.category.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category;

        $category->category_name = $request->category;

        $category->save();
        toastr()->timeOut(1000)->closeButton(true)->success('Categoroy Added successfylly');

        return redirect()->back();
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.category.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->timeOut(1000)->closeButton(true)->success('Categoroy Update successfylly');
        return redirect('/view_category');
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();

        toastr()->timeOut(1000)->closeButton(true)->success('Categoroy Delete successfylly');
        return redirect()->back();
    }



    // --------product--------


    public function view_product(){
        $products = Product::paginate(5);
        return view('admin.product.view_product', compact('products'));
    }

    public function add_product(Request $request)
    {

        $categorys = Category::all();
        return view('admin.product.add_product', compact('categorys'));

    }

    public function upload_product(Request $request)
    {
        $data = new Product();

        $data->title = $request->title;
        $data->description = $request->description;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->quantity;

        $data->save();

        toastr()->timeOut(1000)->closeButton(true)->success('Product added successfylly');
        return redirect('/view_product');
    }

    public function edit_product($id){
        $products = Product::find($id);
        $categorys = Category::all();
        return view('admin.product.edit_product', compact('products','categorys'));

    }


    public function update_product(Request $request, $id){

        $products = Product::find($id);
        $products->title = $request->title;
        $products->description = $request->description;
        
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $products->image = $imagename;
        }

        $products->price = $request->price;
        $products->category = $request->category;
        $products->quantity = $request->quantity;

        $products->save();
        toastr()->timeOut(1000)->closeButton(true)->success('Categoroy Update successfylly');
        return redirect('/view_product');
    }

    public function delete_product($id){

        $product = Product::find($id);
        $image_path = public_path('products/'.$product->image);

        if(file_exists($image_path)){
            unlink($image_path);
        }


        $product->delete();

        toastr()->timeOut(1000)->closeButton(true)->success('Product Delete successfylly');

        return redirect()->back();
    }



}
