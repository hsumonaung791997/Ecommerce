<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brand::orderBy('id' , 'DESC')->get();
        return view('backend.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.brand.create');
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
            'photo' => 'required|mimes:jpeg,jpg,png'
       ]);

       if($request->file()){
           //get request file 
           $filename = time().'_'.$request->photo->getClientOriginalName();

           //file path
           $filepath = $request->file('photo')->storeAs('brandimg', $filename, 'public');

           $path = '/storage/'.$filepath;

       }
       $brand = new Brand;
       $brand->name = $request->name;
       $brand->photo = $path;
       $brand->save();
       return redirect()->route('brand.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
        return view('backend.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        //
        $request->validate([
            'name' => 'required|min:5',
            'photo' => 'sometimes|mimes:jpeg,jpg,png'
       ]);

       if($request->file()){
           //get request file 
           $filename = time().'_'.$request->photo->getClientOriginalName();

           //file path
           $filepath = $request->file('photo')->storeAs('brandimg', $filename, 'public');

           $path = '/storage/'.$filepath;
           $brand->photo = $path;

       }

        $brand->name = $request->name;
       $brand->save();
       return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        //
        $brand->delete();
        return redirect()->route('brand.index');
    }
}
