<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(){
        return view('admin.sub-category.index',[
            'subCategories' => SubCategory::all()
        ]);
    }

    public function create(){
        return view('admin.sub-category.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request){
        SubCategory::newSubCategory($request);
        return redirect()->route('sub.category.index')->with('success','SubCategory Added Succesfully');

    }

    public function edit($id){
        return view('admin.sub-category.edit',[
            'categories' => Category::all(),
            'subCategory' => SubCategory::find($id)
        ]);
    }

    public function update(Request $request,$id){
        SubCategory::updatedSubCategory($request,$id);
        return redirect()->route('sub.category.index')->with('success','SubCategory Updated Succesfully');
    }

    public function destroy($id){
        SubCategory::deletedSubCategory($id);
        return redirect()->route('sub.category.index')->with('success','SubCategory Deleted Succesfully');
    }
}
