<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\Category;
use App\Models\product;
use App\Models\subcategory;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{

    public function logout() {
        Auth::logout();
        return view('home.userpage');
    }
    public function updateUser(Request $request) {
        $validatedData = $request->validate([
            'phoneno' => 'required|string',
            'email' => 'required|string',
            'address' => 'required|string',
        ]);
        $userId =auth()->user()->id;
        $user = User::find($userId);
        $user->phone = $request['phoneno'];
        $user->address = $request['address'];
        $user->email = $request['email'];
        $user->save();
        return response()->json(['msg','updated successfully']);

    }

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
        if($request->isMethod('GET'))
            return redirect()->back();
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

    public function show_subcategory() {
        $subcategory = subcategory::all();
        return view('admin.show_subcategory', compact('subcategory'));
    }

    public function delete_subcategory(Request $request) {
        $subcategory = subcategory::find($request->subcategory_id);
        $subcategory->delete();
        $subcategories = subcategory::with('category')->get();
        return response()->json(['msg', $subcategories]);
    }

    public function edit_subcategory(Request $request) {
        $subcategory = subcategory::find($request->subcategory_id);
        $categories = Category::all();
        return view('admin.edit_subcategory', compact('subcategory', 'categories'));
    }

    public function submit_edit_subcategory(Request $request) {
        $data = $request->json()->all();
        $subcategory = subcategory::find($data['subcategoryId']);
        $subcategory->category_id = $data['category'];
        $subcategory->subcategory_name = $data['subcategory'];
        $subcategory->save();
        return response()->json(['message','everything perfect']);
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

    public function edit_product($id) {
        $data = product::find($id);
        $categories = Category::all();
        $subcategories = subcategory::all();
        $sub_categories = subcategory::all();
        return view('admin.edit_product', compact('data', 'categories', 'subcategories', 'sub_categories'));
    }

    public function modify_product(Request $request, $id) {
        $product = product::find($id);
        $category = Category::find($request->category);
        $subcategory = subcategory::find($request->subcategory);
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->category = $category->category_name;
        $product->subcategory = $subcategory->subcategory_name;
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);
        $product->image = $imageName;
        $product->save();
        return redirect('/redirect')->with('message', $request->title. " product edited sucessfully");
    }

    public function delete_product($id) {
        $data = product::find($id);
        $data->delete();
        return redirect()->back()->with('message', "Product Removed Successfully");
    }

    public function searchProduct(Request $request) {
        $query = $request->productName;
        $data = product::where('title', 'LIKE', "%$query%")
            ->orWhere('category', 'LIKE', "%$query%")
            ->orWhere('subcategory', 'LIKE', "%$query%")
            ->get();
        return view('admin.show_product', compact('data'));
    }

    public function post_subcategory(Request $request) {
        $data = $request->json()->all();
        $sub_category = new subcategory();
        $sub_category->subcategory_name = $data['subcategory'];
        $sub_category->category_id = $data['category'];
        $sub_category->save();
        return response()->json(['message' => $data['subcategory'].' added to subcategory list successfully']);
    }

    public function view_orders() {
        $orderProducts = Order::all();
        $orderItemGroup = $orderProducts->groupBy('product_id');
        return view('admin.all_orders',compact('orderItemGroup'));
    }

    public function searchOrder(Request $request) {
        $orderProducts = Order::all();
        $orderItemGroup = $orderProducts->groupBy('product_id');
        return view('admin.all_orders',compact('orderItemGroup'));
    }

    public function update_delivery(Request $request) {
        $order = Order::find($request->order_id);
        $order->delivery_status = 1;
        $order->save();
        return response()->json(['msg', "delivery status changed successfully"]);
    }

    public function changePassword(Request $request) {
        $email = $request->email;
        $password = $request->password;
        $user = User::where('email', $email)->first();
        if($user == null)
            return redirect()->back()->with('message', "Please enter correct email");
            $user->password = Hash::make($password);
            $user->save();
        return redirect('login')->with('message', "Password changed successfully");
    }
    public function searchSubcategory(Request $request) {
        $query = $request->searchValue;
    
        $subcategory = Subcategory::where('subcategory_name', 'LIKE', "%$query%")
            ->orWhereHas('category', function ($queryBuilder) use ($query) {
                $queryBuilder->where('category_name', 'LIKE', "%$query%");
            })
            ->get();
    
        return view('admin.show_subcategory', compact('subcategory'));
    }
    
    public function searchCategory(Request $request) {
        $query = $request->searchValue;
        $data = Category::where('category_name', 'LIKE', "%$query%")->get();
        return view('admin.category', compact('data'));
    }
    
    
    
}
