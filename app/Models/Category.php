<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image','status'];

    public static function createOrUpdateCategory($request,$id=null){
        
        Category::updateOrCreate(['id' => $id],[
                'name' => $request->name,
                'description' => $request->description,
                'image' => fileUpload($request->file('image'),'category-images',isset($id)? Category::find($id)->image:null),
                'status' => $request->status,

        ]);
    }

}
