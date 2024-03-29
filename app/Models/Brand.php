<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable =['name','description','image','status'];

    private static $brand,$image,$imageName,$directory,$imageUrl;

    public static function getImageUrl($request){
        self::$image                =   $request->file('image');
        self::$imageName            =   rand(10,10000).time().self::$image->getClientOriginalName();
        self::$directory            =   'admin/upload-files/brand-images/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl             =   self::$directory.self::$imageName;

        return self::$imageUrl;
    }

    public static function createNewBrand($request){
        self::$brand                    =   new Brand();
        self::$brand->name              =   $request->name;
        self::$brand->description       =   $request->description;
        self::$brand->image             =   self::getImageUrl($request);
        self::$brand->status            =   $request->status;
        self::$brand->save();
    }

    public static function updatedBrand($request,$id){
        self::$brand                    =   Brand::find($id);
        
        if($request->file('image')){
            if(file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }
            self::$imageUrl             =   self::getImageUrl($request);
        }else{
            self::$imageUrl             =   self::$brand->image;
        }

        self::$brand->name              =   $request->name;
        self::$brand->description       =   $request->description;
        self::$brand->image             =   self::$imageUrl;
        self::$brand->status            =   $request->status;
        self::$brand->save();
        

    }

    public static function deletedBrand($id){
        self::$brand                    =   Brand::find($id);
        if(file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }

        self::$brand->delete();
    }
}
