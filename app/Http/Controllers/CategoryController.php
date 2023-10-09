<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.index',[
            'categories'    => Category::all()
        ]);
    }


    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){
        Category::createNewCategory($request);

        return redirect()->route('category.index')->with('success','Category Added Successfully');
    }

    public function edit($id){
        return view('admin.category.edit',[
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request,$id){
        Category::updatedCategory($request,$id);

        return redirect()->route('category.index')->with('success','Category Updated Successfully');
    }

    public function destroy($id){
        Category::deletedCategory($id);

        return redirect()->route('category.index')->with('success','Category Deleted Successfully');
    }
}
