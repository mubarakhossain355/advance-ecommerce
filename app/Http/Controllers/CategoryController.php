<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index(){
        
        
        return view('admin.category.index',['categories' =>Category::all()]);
    }

    public function create(){
        return view('admin.category.create');
    }


    public function store(Request $request){
        Category::createOrUpdateCategory($request);

        return redirect()->route('category.index')->with('success','Category Added Succesfully');
    }

    public function edit($id){
        return view('admin.category.edit',[
            'category' => Category::find($id)
        ]);
    }

    public function update(Request $request, $id){
        Category::createOrUpdateCategory($request,$id);

        return redirect()->route('category.index')->with('success','Category Updated Succesfully');
    }

    public function destroy($id){
        $category = Category::find($id);
        if(file_exists($category->image)){
            unlink($category->image);
        }

        $category->delete();
        return back()->with('success','Category Deleted Succesfully');
    }
}
