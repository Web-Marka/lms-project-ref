<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use App\Models\Course;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CourseLecture;
use App\Models\CourseSection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class CourseController extends Controller
{
    public function AllCourse()
    {
        $id = Auth::user()->id;
        $courses = Course::where('instructor_id', $id)->orderBy('id', 'desc')->get();
        return view('instructor.courses.all_course', compact('courses'));
    }

    public function AddCourse()
    {
        $categories = Category::latest()->get();
        return view('instructor.courses.add_course', compact('categories'));
    }

    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id', $category_id)->orderBy('subcategory_name', 'ASC')->get();
        return json_encode($subcat);
    }

    public function StoreCourse(Request $request)
    {
        if ($request->file('course_image')) {
            $manager = new ImageManager(new Driver());
            $name_generate = hexdec(uniqid()) . '.' . $request->file('course_image')->getClientOriginalExtension();
            $img = $manager->read($request->file('course_image'));
            $img = $img->resize(710, 488);

            $img->toJpeg(80)->save(base_path('public/upload/course/' . $name_generate));
            $save_url = 'upload/course/' . $name_generate;

            $course_id = Course::insertGetId([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'instructor_id' => Auth::user()->id,
                'course_name' => $request->course_name,
                'course_meta_description' => $request->course_meta_description,
                'course_content' => $request->course_content,
                'course_description' => $request->course_description,
                'requirements' => $request->requirements,
                'video' => $request->video,
                'language' => $request->language,
                'duration' => $request->duration,
                'certificate' => $request->certificate,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'status' => 1,
                'course_name_slug' => Str::slug($request->course_name, '-'),
                'course_image' => $save_url,
                'created_at' => Carbon::now()->toDateTimeString(),
            ]);
        }

        $notification = array(
            'message' => 'Kurs Başarılı Şekilde Eklendi.',
            'alert-type' => 'success'
        );
        return redirect()->route('all.course')->with($notification);
    }

    public function EditCourse($id)
    {
        $course = Course::find($id);
        $categories = Category::latest()->get();
        $subcategories = SubCategory::latest()->get();
        return view('instructor.courses.edit_course', compact('course','categories','subcategories'));
    }

    public function UpdateCourse(Request $request)
    {
        $cid = $request->course_id;

            Course::find($cid)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'instructor_id' => Auth::user()->id,
                'course_name' => $request->course_name,
                'course_meta_description' => $request->course_meta_description,
                'course_content' => $request->course_content,
                'course_description' => $request->course_description,
                'requirements' => $request->requirements,
                'video' => $request->video,
                'language' => $request->language,
                'duration' => $request->duration,
                'certificate' => $request->certificate,
                'selling_price' => $request->selling_price,
                'discount_price' => $request->discount_price,
                'course_name_slug' => Str::slug($request->course_name, '-'),
            ]);

            $notification = array(
                'message' => 'Kurs Başarılı Şekilde Güncellendi.',
                'alert-type' => 'success'
            );
            return redirect()->route('all.course')->with($notification);
    }

    public function UpdateCourseImage(Request $request)
    {
        $course_id = $request->id;
        $oldImage = $request->old_img;

        $request->file('course_image');
        $manager = new ImageManager(new Driver());
        $name_generate = hexdec(uniqid()).'.'.$request->file('course_image')->getClientOriginalExtension();
        $img = $manager->read($request->file('course_image'));
        $img = $img->resize(550,300);

        $img->toJpeg(80)->save(base_path('public/upload/course/'.$name_generate));
        $save_url = 'upload/course/'.$name_generate;

        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Course::find($course_id)->update([
            'course_image' => $save_url,
            'updated_at' => Carbon::now()->toDateTimeString(),
        ]);

        $notification = array(
            'message' => 'Kurs Görseli Başarılı Şekilde Güncellendi.',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }


    public function DeleteCourse($id)
    {
        $course = Course::find($id);
        $img = $course->course_image;
        unlink($img);

        Course::find($id)->delete();

        $notification = array(
            'message' => 'Kurs Başarılı Şekilde Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->route('all.course')->with($notification);
    }

    public function AddCourseLecture($id)
    {
        $course = Course::find($id);
        $section = CourseSection::where('course_id', $id)->latest()->get();
        return view ('instructor.courses.section.add_course_lecture' , compact('course','section'));
    }

    public function AddCourseSection(Request $request)
    {
        $cid = $request->id;
        CourseSection::insert([
            'course_id' => $cid,
            'section_title' => $request->section_title,
        ]);

        $notification = array(
            'message' => 'Kurs Video Başlığı Başarılı Şekilde Eklendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function SaveLecture(Request $request)
    {
        $lecture = new CourseLecture();
        $lecture->course_id     = $request->course_id;
        $lecture->section_id    = $request->section_id;
        $lecture->lecture_title = $request->lecture_title;
        $lecture->url           = $request->lecture_url;
        $lecture->content       = $request->content;
        $lecture->save();

        return response()->json(['success' => 'Başarılı']);
    }

    public function EditLecture ($id)
    {
        $lecture = CourseLecture::find($id);
        return view('instructor.courses.lecture.edit_course_lecture', compact('lecture'));
    }

    public function UpdateLecture (Request $request)
    {
        $lectureId = $request->id;
        CourseLecture::find($lectureId)->update([
            'lecture_title' => $request->lecture_title,
            'content' => $request->content,
            'url' => $request->url,
        ]);

        $notification = array(
            'message' => 'Kurs Video Başlığı Güncellendi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteLecture($id)
    {
        CourseLecture::find($id)->delete();

        $notification = array(
            'message' => 'Kurs Video Başlığı Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

    public function DeleteSection ($id)
    {
        $section = CourseSection::find($id);
        $section -> lectures()->delete();
        $section -> delete();

        $notification = array(
            'message' => 'Kurs Video Başlığı Silindi.',
            'alert-type' =>'success'
        );
        return redirect()->back()->with($notification);
    }

}
