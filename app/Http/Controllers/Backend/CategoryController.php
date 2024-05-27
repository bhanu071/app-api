<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    //

    public function AddCategory(){
        return view("backend.category.add_category");
    }

    public function StoreCategory(Request $request){

        if($request->file("category_img")){
            $manager = new ImageManager(new Driver());
            $name_gen = hexdec(uniqid()).'.'.$request->file('category_img')->getClientOriginalExtension();
            $image = $manager->read($request->file("category_img"));
            $image = $image->resize(100, 100);
            $image->toJpeg(80)->save(base_path("public/upload/category/".$name_gen));
            $save_url = 'upload/category/.$name_gen';

            Category::insert([
                "category_name" => $request->cateory_name,
                "category_desc" => $request->category_desc,
                "category_image" => $save_url,
            ]);

            return redirect()->back();
        }

    }
}
