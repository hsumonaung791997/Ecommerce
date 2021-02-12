<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\SubCategory;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::orderBy('id', 'DESC')->get();
        return view('backend.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $brands = Brand::all();
        $subcategories = SubCategory::all();
        return view('backend.item.create', compact('brands','subcategories'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:5',
            'photo' => 'required|mimes:jpeg,jpg',
            'codeno' => 'required',
            'subcategory' => 'required',
            'brand' => 'required',
            'price' => 'required',

        ]);

        if($request->file()){

            $filename = time().'_'.$request->photo->getClientOriginalName();

            $filepath = $request->file('photo')->storeAs('itemimg', $filename, 'public');

            $path = '/storage/'.$filepath;
        }
        $item = new Item;
        $item->name = $request->name;
        $item->photo = $path;
        $item->codeno = $request->codeno;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        $brands = Brand::all();
        $subcategories = SubCategory::all();

        return view('backend.item.edit', compact('item', 'brands', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //

        $request->validate([
            'name' => 'required|min:5',
            'photo' => 'sometimes|mimes:jpeg,jpg,png',
            'codeno' => 'required',
  
        ]);
 
        // $delete_file_path = Str::substr($request->old_image, 17);

        // Storage::delete('itemimg/'.$delete_file_path);
        // return "Success delete image";

        if($request->file()){

            $filename = time().'_'.$request->photo->getClientOriginalName();

            $filepath = $request->file('photo')->storeAs('itemimg', $filename, 'public');

            $path = '/storage/'.$filepath;

         
           
            $item->photo = $path;

        }
         $item->name = $request->name;
        $item->codeno = $request->codeno;
        $item->price = $request->price;
        $item->discount = $request->discount;
        $item->description = $request->description;
        $item->brand_id = $request->brand;
        $item->subcategory_id = $request->subcategory;
        $item->save();

        return redirect()->route('item.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $item->Delete();
        return redirect()->route('item.index');
    }
}
