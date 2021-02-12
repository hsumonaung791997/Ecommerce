<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Brand;
use App\Models\Order;
use Auth;


class HomeController extends Controller
{
    //
    public function index()
    {
        $items = Item::all();
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        $discount_items = Item::where('discount','!=', 0)->get();
        $fresh_pick_items =  Item::all()->random(10); 
         return view('frontend.index', compact('items','categories','subcategories','brands','discount_items','fresh_pick_items'));
    }

    public function item($id)
    {
        $items = Item::where('subcategory_id',$id)->get();
        $subcategories = Subcategory::all();
        $categories = Category::all();
         return view('frontend.subcategory', compact('items','subcategories','categories'));
     }

     public function itemdetails($id)
     {
        $item_detail = Item::where('id',$id)->first();
        $categories = Category::all();
         return view('frontend.itemdetail',compact('item_detail','categories'));
     }

     public function cart()
     {  
        $categories = Category::all();
         return view('Frontend.cart', compact('categories'));
     }

     public function orderhistory(){


        $categories = Category::all();

        $orders =Order::where('user_id',Auth::id())->orderBy('id', 'desc')->get();
         return view('frontend.orderhistory', compact('orders','categories'));
     }

    

}
