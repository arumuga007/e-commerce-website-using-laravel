<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\product;

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
}
