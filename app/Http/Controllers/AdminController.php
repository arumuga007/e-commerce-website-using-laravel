<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\product;

class AdminController extends Controller
{
    public function view_category() {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request) {
        $data = new Category();
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('message',"The category ".$data->category_name."  added successfully");
    }
    public function edit_category($id, $new_name) {
        $data = Category::find($id);
        $data->category_name = $new_name;
        return redirect()->back()->with('message', "The category edited successfully");
    }
    public function delete_category($id) {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', "The category ".$data->category_name." deleted successfully");
    }
    public function view_product() {
        $data = Category::all();
        return view('admin.product', compact('data'));
    }

    public function add_product(Request $request) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $product = new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category = $request->category;
        $product->image = $imageName;
        $product->save();
        return redirect()->back()->with('message', $request->title. " product added sucessfully");
        
    }
    public function show_product() {
        return view('admin.show_product');
    }
}
