<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\product;
use App\Models\Cart;

class HomeController extends Controller
{
    public function redirect() {
        $usertype = Auth::user()->usertype;
        if($usertype == 1)
            return view('admin.home');
        else
            return view('home.userpage');
    }
    public function getProducts(Request $request) {
        $offset = $request->input('offset', 0);
        $limit = $request->input('limit', 10);
        
        $products = product::offset($offset)->limit($limit)->get();
        
        return response()->json($products);
    }

    public function productDetails(Request $request)
    {
        $product_id = $request->input('product_id', 0);
        $data = product::find($product_id);
        return view('home.productDetails', compact('data'));
    }

    public function add_cart(Request $request) {
        $user_id = auth()->user()->id;
    $data = $request->json()->all();
    Cart::create([
        'quantity' => $data['quantity'],
        'user_id' => $user_id,
        'product_id' => $data['productId']
    ]);
        return response()->json(['message' => $data]);
    }
    public function cart_products() {
        $user = auth()->user();
        $cartItems = $user->products;
        $cartItemsGroups = $cartItems->groupBy('product_id');
        return view('home.cart', compact('cartItemsGroups'));
    }
    public function place_order() {
        $user = auth()->user();
        $cartItems = $user->products;
        $data['price'] = 0;
        $data['discount_price'] = 0;
        foreach($cartItems as $cartItem) {
            $product = $cartItem->product;
            $data['price'] += $product->price;
            $data['discount_price'] += $product->discount_price;
        }
        return view('home.place_order_details', compact('user'));
    }
    public function confirm_order(Request $request) {
        $user = User::find($request->user_id);
        $cartItems = $user->products;
        foreach($cartItems as $cartItem) {
            dump($cartItem->product_id);
        }
    }
}
