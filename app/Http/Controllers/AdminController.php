<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();

        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request){
        $category = new Category;

        $category->category_name= $request->category;

        $category->save();
        toastr()->timeOut(1000)->closeButton(true)->success('Categoroy Added successfylly');

        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        toastr()->timeOut(1000)->closeButton(true)->success('Categoroy Deleted Successfully');
        return redirect()->back();
    }
}
  