<?php

namespace App\Http\Controllers\Frontend;

use Carbon\Carbon;
use App\Models\Faq;
use App\Models\User;
use App\Models\Order;
use App\Models\Course;
use App\Models\Category;
use App\Models\Hakkimizda;
use App\Models\SiteSetting;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{
    public function AllCourses ()
    {
        $instructor = Course::whereNotNull('instructor_id')->with('user')->get();
        $courses = Course::where('status', '1')->paginate(6);
        $categories = Category::latest()->get();
        return view('frontend.course.courses', compact('instructor','courses','categories'));
    }

    public function FilterCourses(Request $request)
    {
        $sortBy = $request->input('sortSelect');
        $selectedOption = $sortBy;

        switch ($sortBy) {
            case 'newest':
                $courses = Course::where('status', '1')->latest()->paginate(6);
                break;
            case 'popular':
                $courses = Course::where('status', '1')->inRandomOrder()->paginate(6);
                break;
            case 'price-desc':
                $courses = Course::where('status', '1')->orderBy('discount_price', 'desc')->paginate(6);
                break;
            case 'price-asc':
                $courses = Course::where('status', '1')->orderBy('discount_price', 'asc')->paginate(6);
                break;
            default:
                $courses = Course::where('status', '1')->paginate(6);
        }

        $instructor = Course::whereNotNull('instructor_id')->with('user')->get();
        $categories = Category::latest()->get();

        return view('frontend.course.filter_courses', compact('instructor', 'categories', 'courses','selectedOption'));
    }

    public function searchCourses(Request $request)
    {
        $searchTerm = $request->input('searchInput');

        $courses = Course::where('course_name', 'like', "%$searchTerm%")->paginate(6);

        $instructor = Course::whereNotNull('instructor_id')->with('user')->get();
        $categories = Category::latest()->get();

        return view('frontend.course.search_results', compact('courses', 'instructor', 'categories'));
    }

    public function CourseDetails($slug,$id)
    {
        $course = Course::find($id);
        $ins_id = $course->instructor_id;
        $instructorCourses = Course::where('instructor_id', $ins_id)->orderBy('id','DESC')->get();
        $categories = Category::latest()->get();
        $cat_id = $course->category_id;
        $relatedCourse = Course::where('category_id', $cat_id)->where('id', '!=', $id)->orderBy('id','DESC')->limit(3)->get();

        return view('frontend.course.course_details', compact('course', 'instructorCourses', 'categories', 'relatedCourse'));
    }

    public function CategoryCourse($slug, $id)
    {
        $instructor = Course::whereNotNull('instructor_id')->with('user')->get();
        $courses = Course::where('category_id', $id)->where('status', '1')->paginate(6);
        $category = Category::where('id', $id)->first();
        $categories = Category::latest()->get();

        return view('frontend.course.category_details', compact('courses', 'category', 'categories', 'instructor'));
    }

    public function SubCategoryCourse($slug, $id)
    {
        $instructor = Course::whereNotNull('instructor_id')->with('user')->get();
        $courses = Course::where('subcategory_id', $id)->where('status', '1')->paginate(6);
        $subcategory = SubCategory::where('id', $id)->first();
        $subcategories = SubCategory::latest()->get();

        return view('frontend.course.subcategory_details', compact('courses', 'subcategory', 'subcategories', 'instructor'));
    }

    public function InstructorDetails ($id)
    {
        $instructor = User::find($id);
        $courses = Course::where('instructor_id', $id)->paginate(6);
        return view('frontend.instructor.instructor_details', compact('instructor','courses'));
    }

    public function Iletisim()
    {
        $iletisim = SiteSetting::find(1);
        return view('frontend.pages.iletisim',compact('iletisim'));
    }

    public function Hakkimizda()
    {
        $hakkimizda = Hakkimizda::find(1);
        return view('frontend.pages.hakkimizda',compact('hakkimizda'));
    }

    public function SSS()
    {
        $faq_main_title = Faq::find(1); // id değeri 1 olan kaydı al
        $faq_content = Faq::where('id', '!=', 1)->latest()->get(); // id değeri 1 olmayan en son kayıtları al
        return view('frontend.pages.sikca-sorulan-sorular',compact('faq_main_title','faq_content'));
    }

    public function GizlilikPolitikasi()
    {
        return view('frontend.pages.gizlilik-politikasi');
    }

    public function MesafeliSatis()
    {
        return view('frontend.pages.mesafeli-satis-sozlesmesi');
    }

    public function CerezPolitikasi()
    {
        return view('frontend.pages.cerez-politikasi');
    }

}
