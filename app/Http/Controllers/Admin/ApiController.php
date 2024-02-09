<?php

namespace App\Http\Controllers\Admin;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Page;
use App\Models\Room;
use App\Models\Team;
use App\Models\Course;
use App\Models\Patner;
use App\Models\Slider;
use App\Models\Country;
use App\Models\Inquiry;
use App\Models\Service;
use App\Models\Setting;
use App\Models\FoodDrink;
use App\Models\SocialMedia;
use App\Models\Testimonial;
use App\Models\SuccessStory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    public function serviceIndex()
    {
        try {
            $services = Service::oldest('order')->get();
            foreach ($services as $service) {
                $service['image'] = asset('admin/assets/img/service/' . $service->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $services,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function serviceSingle($slug)
    {
        try {
            $service = Service::where('slug', $slug)->first();
            $service['image'] = asset('admin/assets/img/service/' . $service->image);

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $service,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function blogIndex()
    {
        try {
            $blogs = Blog::latest()->get();
            foreach ($blogs as $blog) {
                $blog['image'] = asset('admin/assets/img/blog/' . $blog->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $blogs,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function blogSingle($slug)
    {
        try {
            $blog = Blog::where('slug', $slug)->first();
            $blog['image'] = asset('admin/assets/img/blog/' . $blog->image);
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $blog,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function testimonialIndex()
    {
        try {
            $testimonials = Testimonial::oldest('order')->get();
            foreach ($testimonials as $testimonial) {
                $testimonial['image'] = asset('admin/assets/img/testimonial/' . $testimonial->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $testimonials,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function partnerIndex()
    {
        try {
            $partners = Patner::oldest('order')->get();
            foreach ($partners as $partner) {
                $partner['image'] = asset('admin/assets/img/partners/' . $partner->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $partners,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function teamIndex()
    {
        try {
            $teams = Team::oldest('order')->get();
            foreach ($teams as $team) {
                $team['image'] = asset('admin/assets/img/teams/' . $team->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $teams,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function faqIndex()
    {
        try {
            $faqs = Faq::oldest('order')->get();
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $faqs,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function pageIndex()
    {
        try {
            $pages = Page::oldest('order')->get();
            foreach ($pages as $page) {
                $page['image'] = asset('admin/assets/img/page/' . $page->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $pages,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function pageSingle($slug)
    {
        try {
            $page = Page::where('slug', $slug)->first();

            $page['image'] = asset('admin/assets/img/page/' . $page->image);
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $page,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function sliderIndex()
    {
        try {
            $sliders = Slider::oldest('order')->get();
            foreach ($sliders as $slider) {
                $slider['image'] = asset('admin/assets/img/slider/' . $slider->image);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $sliders,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function socialmediaIndex()
    {
        try {
            $socialmedias = SocialMedia::oldest('order')->get();
            foreach ($socialmedias as $socialmedia) {
                $socialmedia['image'] = asset('admin/assets/img/socialmedia/' . $socialmedia->image);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $socialmedias,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }



    public function successstoryIndex()
    {
        try {
            $successstories = SuccessStory::oldest('order')->get();
            foreach ($successstories as $successstory) {
                $successstory['image'] = asset('admin/assets/img/successstory/' . $successstory->image);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $successstories,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


    public function indexInquiry(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'email|required',
                'phone' => 'numeric|required',
                'message' => 'required',
            ]);


            if ($validation->fails()) {
                return response()->json(['statusCode' => 401, 'error' => true, 'error_message' => $validation->errors(), 'message' => 'Please fill the input field properly']);
            }
            Inquiry::create($request->all());
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                'message' => 'Thank you, your enquiry has been submitted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function settings()
    {
        try {
            $settings = Setting::pluck('value', 'key');

            if ($settings['site_main_logo']) {
                $settings['site_main_logo'] = asset('admin/images/setting/' . $settings['site_main_logo']);
            }

            if ($settings['site_footer_logo']) {
                $settings['site_footer_logo'] = asset('admin/images/setting/' . $settings['site_footer_logo']);
            }

            if ($settings['fav_icon']) {
                $settings['fav_icon'] = asset('admin/images/setting/' . $settings['fav_icon']);
            }


            if ($settings['contact_image']) {
                $settings['contact_image'] = asset('admin/images/setting/' . $settings['contact_image']);
            }

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $settings,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }




      public function roomIndex()
    {
        try {
            $rooms = Room::oldest('order')->get();
            foreach ($rooms as $room) {
                $room['image'] = asset('admin/assets/img/room/' . $room->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $rooms,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


 public function roomSingle($slug)
    {
        try {
            $room = Room::where('slug', $slug)->first();
            $room['image'] = asset('admin/assets/img/room/' . $room->image);

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $room,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }



      public function fooddrinksIndex()
    {
        try {
            $fooddrinks = FoodDrink::oldest('order')->get();
            foreach ($fooddrinks as $fooddrink) {
                $room['image'] = asset('admin/assets/img/food_drink/' . $fooddrink->image);
            }
            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $fooddrinks,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


 public function fooddrinkSingle($slug)
    {
        try {
            $fooddrink = FoodDrink::where('id', $id)->first();
            $fooddrink['image'] = asset('admin/assets/img/food_drink/' . $fooddrink->image);

            return response()->json([
                "statusCode" => 200,
                "error" => false,
                "data" => $fooddrink,
                'message' => 'Retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json(['statusCode' => 401, 'error' => true, 'message' => $e->getMessage()]);
        }
    }


}