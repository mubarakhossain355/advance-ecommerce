<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(){
        return view('admin.brand.index',[
            'brands'    => Brand::all()
        ]);
    }


    public function create(){
        return view('admin.brand.create');
    }

    public function store(Request $request){
        Brand::createNewBrand($request);

        return redirect()->route('brand.index')->with('success','Brand Added Successfully');
    }

    public function edit($id){
        return view('admin.brand.edit',[
            'brand' => Brand::find($id)
        ]);
    }

    public function update(Request $request,$id){
        Brand::updatedBrand($request,$id);

        return redirect()->route('brand.index')->with('success','Brand Updated Successfully');
    }

    public function destroy($id){
        Brand::deletedBrand($id);

        return redirect()->route('brand.index')->with('success','Brand Deleted Successfully');
    }
}
