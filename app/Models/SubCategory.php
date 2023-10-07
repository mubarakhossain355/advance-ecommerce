<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    private static $subcategory,$image,$imageName,$directory,$imageUrl;

    protected $fillable =['category_id','name','description','image','status'];

    public static function getImageUrl($request){
        self::$image        = $request->file('image');
        self::$imageName    = self::$image->getClientOriginalName();
        self::$directory    = 'admin/upload-files/subCategory-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl     = self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function newSubCategory($request){
        self::$subcategory                  =  new SubCategory();
        self::$subcategory->category_id     = $request->category_id;
        self::$subcategory->name            = $request->name;
        self::$subcategory->description     = $request->description;
        self::$subcategory->status          = $request->status;
        self::$subcategory->image           = self::getImageUrl($request);
        self::$subcategory->save();
    }

    public static function updatedSubCategory($request,$id){
        self::$subcategory              =  SubCategory::find($id);

        if($request->file('image')){
            if(file_exists(self::$subcategory->image)){
                unlink(self::$subcategory->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }else{
            self::$imageUrl = self::getImageUrl($request);
        }

        self::$subcategory->category_id     = $request->category_id;
        self::$subcategory->name            = $request->name;
        self::$subcategory->description     = $request->description;
        self::$subcategory->status          = $request->status;
        self::$subcategory->image           = self::$imageUrl;
        self::$subcategory->save();

    }

    public static function deletedSubCategory($id){
        self::$subcategory              =  SubCategory::find($id);

            if(file_exists(self::$subcategory->image)){
                unlink(self::$subcategory->image);
            }

         self::$subcategory->delete();
    } 

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
