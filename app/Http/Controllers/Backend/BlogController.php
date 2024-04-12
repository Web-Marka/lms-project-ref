<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Blog;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.backend.blog.blog_category', compact('blogCategory'));
    }

    public function AddBlogCategory()
    {
        return view('admin.backend.blog.add_blog_category');
    }

    public function StoreBlogCategory(Request $request)
    {

        $rules = [
            'category_name' => 'required',
            'category_meta' => 'required|max:255',
        ];

        $request->validate($rules);

        BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_meta' => $request->category_meta,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);

        $notification = array(
            'message' => 'Kategori Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $blogCategory = BlogCategory::find($id);
        return view('admin.backend.blog.edit_blog_category', compact('blogCategory'));
    }

    public function UpdateBlogCategory(Request $request)
    {
        $rules = [
            'category_name' => 'required',
            'category_meta' => 'required|max:255',
        ];

        $request->validate($rules);

        $cat_id = $request->id;

        BlogCategory::find($cat_id)->update([
            'category_name' => $request->category_name,
            'category_meta' => $request->category_meta,
            'category_slug' => Str::slug($request->category_name, '-'),
        ]);

        $notification = array(
            'message' => 'Kategori Başarılı Şekilde Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        $item = BlogCategory::find($id);
        BlogCategory::find($id)->delete();

        $notification = array(
            'message' => 'Kategori Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.category')->with($notification);
    }

    public function Blog()
    {
        $blog = Blog::latest()->get();
        return view('admin.backend.blog.blog_posts', compact('blog'));
    }

    public function AddBlogPost()
    {
        $blogPost = BlogCategory::latest()->get();
        return view('admin.backend.blog.add_blog_post',compact('blogPost'));
    }

    public function EditBlogPost($id)
    {
        $blogCategory = BlogCategory::latest()->get();
        $blogPost = Blog::find($id);
        return view('admin.backend.blog.edit_blog_post', compact('blogPost','blogCategory'));
    }

    public function StoreBlogPost(Request $request)
    {
        if ($request->file('blog_image')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('blog_image')->getClientOriginalExtension();
            $img = $manager->read($request->file('blog_image'));
            $img = $img->resize(1085, 645);

            $img->toJpeg(80)->save(base_path('public/upload/blog/' . $name_generate));
            $save_url = 'upload/blog/' . $name_generate;

            Blog::insertGetId([
                'blogcat_id' => $request->blogcat_id,
                'blog_title' => $request->blog_title,
                'blog_meta' => $request->blog_meta,
                'blog_slug' => Str::slug($request->blog_title, '-'),
                'blog_content' => $request->blog_content,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        $notification = array(
            'message' => 'Blog Yazısı Başarılı Şekilde Eklendi',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.blog.posts')->with($notification);
    }

    public function UpdateBlogPost(Request $request)
    {
        $post_id = $request->id;

        if ($request->file('blog_image')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('blog_image')->getClientOriginalExtension();
            $img = $manager->read($request->file('blog_image'));
            $img = $img->resize(1085, 645);

            $img->toJpeg(80)->save(base_path('public/upload/blog/' . $name_generate));
            $save_url = 'upload/blog/' . $name_generate;

            Blog::find($post_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'blog_title' => $request->blog_title,
                'blog_meta' => $request->blog_meta,
                'blog_slug' => Str::slug($request->blog_title, '-'),
                'blog_content' => $request->blog_content,
                'blog_tags' => $request->blog_tags,
                'blog_image' => $save_url,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

            $notification = array(
                'message' => 'Blog Yazısı Başarılı Şekilde Güncellendi',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.posts')->with($notification);
        } else {

            Blog::find($post_id)->update([
                'blogcat_id' => $request->blogcat_id,
                'blog_title' => $request->blog_title,
                'blog_meta' => $request->blog_meta,
                'blog_slug' => Str::slug($request->blog_title, '-'),
                'blog_content' => $request->blog_content,
                'blog_tags' => $request->blog_tags,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);

            $notification = array(
                'message' => 'Blog Yazısı Başarılı Şekilde Güncellendi',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.blog.posts')->with($notification);
        }
    }

    public function DeleteBlogPost($id)
    {
        $blogPost = Blog::find($id);
        $img = $blogPost->blog_image;
        unlink($img);

        Blog::find($id)->delete();

        $notification = array(
            'message' => 'Blog Yazısı Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('admin.blog.posts')->with($notification);
    }

    public function BlogPage()
    {
        $blog = Blog::latest()->paginate(4);
        $bcategory = BlogCategory::latest()->get();
        $randomPost = Blog::inRandomOrder()->limit(5)->get();
        return view('frontend.blog.blog',compact('blog','bcategory','randomPost'));
    }

    public function BlogDetails($slug)
    {
        $blog = Blog::where('blog_slug',$slug)->first();
        $tags = $blog->blog_tags;
        $tags_all = explode(',',$tags);
        return view('frontend.blog.blog_details',compact('blog','tags_all'));
    }

    public function BlogCategoryPage($id)
    {
        $blog = Blog::where('blogcat_id',$id)->paginate(4);
        $breadcat = BlogCategory::where('id',$id)->first();
        $bcategory = BlogCategory::latest()->get();
        $post = Blog::latest()->limit(3)->paginate(4);
        $randomPost = Blog::inRandomOrder()->limit(5)->get();
        return view('frontend.blog.blog_category',compact('blog','breadcat','bcategory','post','randomPost'));
    }

}
