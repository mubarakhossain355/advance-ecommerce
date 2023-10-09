<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Models\OtherImage;
use App\Models\SubCategory;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $product;

    public function index(){
        return view('admin.product.index',[
            'products'    => Product::all()
        ]);
    }


    // Get Subcatetory by Category

    public function getSubCategoryByCategory(){
        return response()->json(SubCategory::where('category_id',$_GET['id'])->get());
    }


    public function create(){
        return view('admin.product.create',[
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all()
        ]);
    }

    public function store(Request $request){
        
        $this->product = Product::createNewProduct($request);
        OtherImage::newOtherImage($request->other_image,$this->product->id);
        return redirect()->route('product.index')->with('success','Product Added Successfully');
    }

    // Product detail Method

    public function detail($id){
        return view('admin.product.detail',[
            'product' => Product::find($id)
        ]);
    }


    public function edit($id){
        return view('admin.product.edit',[
            'product' => Product::find($id),
            'categories'        => Category::all(),
            'sub_categories'    => SubCategory::all(),
            'brands'            => Brand::all(),
            'units'             => Unit::all()
        ]);
    }

    public function update(Request $request,$id){
        Product::updatedProduct($request,$id);
        if ($request->other_image)
        {
            OtherImage::updateOtherImage($request->other_image, $id);
        }
        return redirect()->route('product.index')->with('success','Product Updated Successfully');
    }

    public function destroy($id){
        Product::deletedProduct($id);

        return redirect()->route('product.index')->with('success','Product Deleted Successfully');
    }
}
