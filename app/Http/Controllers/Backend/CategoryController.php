<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.category.all_category', compact('category'));
    }

    public function AddCategory()
    {
        return view('admin.backend.category.add_category');
    }

    public function StoreCategory(Request $request)
    {

        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(550,300);

            $img->toJpeg(80)->save(base_path('public/upload/category/'.$name_generate));
            $save_url = 'upload/category/'.$name_generate;

            Category::insert([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name,'-'),
                'image' => $save_url,
            ]);
        }

        $notification = array(
            'message' => 'Kategori Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function EditCategory($id)
    {
        $category = Category::find($id);
        return view('admin.backend.category.edit_category', compact('category'));
    }

    public function UpdateCategory(Request $request)
    {
        $cat_id = $request->id;
        if ($request->file('image')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()).'.'.$request->file('image')->getClientOriginalExtension();
            $img = $manager->read($request->file('image'));
            $img = $img->resize(550,300);

            $img->toJpeg(80)->save(base_path('public/upload/category/'.$name_generate));
            $save_url = 'upload/category/'.$name_generate;

            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name,'-'),
                'image' => $save_url,
            ]);

            $notification = array(
                'message' => 'Kategori Başarılı Şekilde Güncellendi.',
                'alert-type' =>'success'
            );
            return redirect()->route('all.category')->with($notification);

        } else {

            Category::find($cat_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => Str::slug($request->category_name,'-'),
            ]);

            $notification = array(
                'message' => 'Kategori Başarılı Şekilde Güncellendi.',
                'alert-type' =>'success'
            );
            return redirect()->route('all.category')->with($notification);
        }
    }

    public function DeleteCategory($id)
    {
        $item = Category::find($id);
        $img = $item->image;
        unlink($img);

        Category::find($id)->delete();

        $notification = array(
            'message' => 'Kategori Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.category')->with($notification);
    }

    // Sub Category Kodları //

    public function AllSubCategory()
    {
        $subcategory = SubCategory::latest()->get();
        return view('admin.backend.subcategory.all_subcategory', compact('subcategory'));
    }

    public function AddSubCategory()
    {
        $category = Category::latest()->get();
        return view('admin.backend.subcategory.add_subcategory', compact('category'));
    }

    public function StoreSubCategory(Request $request)
    {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name,'-'),
        ]);

        $notification = array(
            'message' => 'Alt Kategori Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function EditSubCategory($id)
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::find($id);
        return view('admin.backend.subcategory.edit_subcategory', compact('category','subcategory'));
    }

    public function UpdateSubCategory(Request $request)
    {
        $subcat_id = $request->id;

        SubCategory::find($subcat_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::slug($request->subcategory_name,'-'),
        ]);

        $notification = array(
            'message' => 'Alt Kategori Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.subcategory')->with($notification);

    }

    public function DeleteSubCategory($id)
    {
        SubCategory::find($id)->delete();

        $notification = array(
            'message' => 'Alt Kategori Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }
}
