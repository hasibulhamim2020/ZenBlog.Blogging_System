<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Category;


class Blog extends Model
{
    use HasFactory;

    private static $blog;
    public static function saveInfo($request,$id=null){
        if ($id!=null){
            self::$blog = Blog::find($id);
        }
        else{
            self::$blog = new Blog();
        }
        self::$blog-> title           = $request->title;
        if (self::$blog-> slug != $request->slug){
            self::$blog-> slug        = self::makeSlug($request);
        }
        self::$blog-> category_id     = $request->category_id;
        self::$blog-> author_name     = $request->author_name;
        self::$blog-> description     = $request->description;
       if ($request->file('image')){
           if (self::$blog->image){
               if (file_exists(self::$blog->image)){
                   unlink(self::$blog->image);
               }
           }
           self::$blog-> image        = self::saveImage($request);
       }
        self::$blog->save();
    }

    private static $image, $imageUrl, $dir ,$imageNewName;
    private static function saveImage($request){
        self::$image        = $request->file('image');
        self::$imageNewName = rand().'.'.self::$image->extension();
        self::$dir          = 'admin-assets/blog-image/';
        self::$imageUrl     = self::$dir.self::$imageNewName;
        self::$image->      move(self::$dir,self::$imageNewName);
        return self::$imageUrl;
    }

    private static $slug;
    private static function makeSlug($request){
        if ($request->slug){
            self::$slug = Str::slug($request->slug,'-');
        }else{
            self::$slug = Str::slug($request->title,'-');
        }
        return self::$slug;
    }

    public static function statusCheck($id){
        self::$blog = Blog::find($id);
        if (self::$blog-> status == 1){
            self::$blog-> status = 0;
        }
        else{
            self::$blog-> status = 1;
        }
        self::$blog->save();
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


}
