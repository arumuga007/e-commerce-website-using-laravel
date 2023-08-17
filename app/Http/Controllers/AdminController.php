<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\product;
use App\Models\subcategory;

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
    public function edit( $id) {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }
    public function modify_category(Request $request,$id) {    
        $data = Category::find($id);
        $data->category_name = $request->newCategory;
        $data->save();
        return redirect('/view_category')->with('message',"The category edited successfully");
    }
    public function delete_category($id) {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', "The category ".$data->category_name." deleted successfully");
    }

    public function view_subcategory() {
        $categories = Category::orderBy('category_name', 'ASC')->get();
        $data['categories'] = $categories;
        return view('admin.subcategory', $data);
    }

    public function add_subcategory(Request $request) {
        $data = new subcategory();
        $data->subcategory_name = $request->subcategory_name;
        $data->category_id = $request->category;
        $data->save();
        return redirect()->back()->with('message',"The subcategory added successfully");
    }
    public function view_product() {
        $categories = Category::all();
        $subcategories = subcategory::all();
        return view('admin.product', compact('categories', 'subcategories'));
    }

    public function add_product(Request $request) {
        $category = Category::find($request->category);
        $subcategory = subcategory::find($request->subcategory);
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $product = new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category = $category->category_name;
        $product->subcategory = $subcategory->subcategory_name;
        $product->image = $imageName;
        $product->save();
        return redirect()->back()->with('message', $request->title. " product added sucessfully");
        
    }
    public function show_product() {
        $data = product::all();
        return view('admin.show_product', compact('data'));
    }
}
