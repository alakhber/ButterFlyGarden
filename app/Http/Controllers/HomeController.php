<?php

namespace App\Http\Controllers;

use App\Http\Requests\Project\FrontEnd\Subscription\StoreSubscriptionRequest;
use App\Http\Requests\SendContactMailRequest;
use App\Mail\ContactMail;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Project;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Subscription;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Personal;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $sendData = [
            'sliders' => Slider::whereStatus(1)->orderBy('position')->get(),
            'blogs' => Blog::whereStatus(1)->limit(4)->get(),
            'services' => Service::whereStatus(1)->limit(4)->get(),
            'products' => Product::with(['detail', 'category'])->whereStatus(1)->limit(4)->get(),
            'personals' => Personal::whereStatus(1)->get(),
            'partners' => Partner::whereStatus(1)->orderBy('position')->get(),
        ];
        return view('main.pages.index', $sendData);
    }

    public function services()
    {
        $sendData = [
            'services' => Service::whereStatus(1)->orderBy('position')->paginate(9),
        ];
        return view('main.pages.services', $sendData);
    }

    public function products($slug = null)
    {
        if (!is_null(request()->get('q'))) {
            $products = Product::whereStatus(1)->where('name','LIKE','%'.request()->get('q').'%')->with('category')->paginate(12);
        } elseif (!is_null($slug)) {
            $cat = Category::whereStatus(1)->whereSlug($slug)->firstOrFail();
            $subCatID = Category::whereStatus(1)->whereCategoryId($cat->id)->get()->pluck('id')->toArray();
            array_push($subCatID, $cat->id);
            $products = Product::whereStatus(1)->whereIn('category_id',$subCatID)->with(['category'])->paginate(12);
        } else {
            $products = Product::whereStatus(1)->with('category')->paginate(12);
        }
        $categories = Category::whereStatus(1)
            ->whereCategoryId(1)
            ->where('id', '!=', 1)
            ->withCount('products')
            ->having('products_count', '>', 0)
            ->with(['child' => function ($q) {
                $q->with('products')->withCount('products')->having('products_count', '>', 0);
            }])->withCount(['child' => function ($q) {
                $q->with('products')->withCount('products')->having('products_count', '>', 0);
            }])->get();

        $sendData = [
            'products' => $products,
            'categories' => $categories,
        ];
        return view('main.pages.products', $sendData);
    }

    public function product($slug)
    {
        $product = Product::whereStatus(1)->whereSlug($slug)->firstOrFail();
        $sendData = [
            'product' => $product,
            'otherProducts' => Product::where('id', '!=', $product->id)->with(['gallery','seo','detail','category'])->whereStatus(1)->get()->take(5),
        ];
        return view('main.pages.product', $sendData);
    }

    public function productsByCategory($slug)
    {
        $sendData = [
            'categories' => Category::whereStatus(1)->get(),
            'category' => Category::whereSlug($slug)->whereStatus(1)->firstOrFail(),
        ];

        return view('main.pages.products-by-category', $sendData);
    }

    public function service($slug)
    {
        $service = Service::whereStatus(1)->whereSlug($slug)->firstOrFail();

        $sendData = [
            'service' => $service,
            'services' => Service::where('id', '!=', $service->id)->whereStatus(1)->limit(5)->get(),
        ];
        return view('main.pages.service', $sendData);
    }

    public function blogs()
    {
        $sendData = [
            'recentBlogs' => Blog::whereStatus(1)->limit(4)->get(),
            'blogs' => Blog::whereStatus(1)->paginate(4),
        ];

        return view('main.pages.blogs', $sendData);
    }


    public function blog($slug)
    {
        $blog = Blog::whereSlug($slug)->whereStatus(1)->firstOrFail();

        $sendData = [
            'blog' => $blog,
            'latestBlogs' => Blog::where('id', '!=', $blog->id)->whereStatus(1)->limit(5)->orderBy('id', 'DESC')->get(),
        ];

        return view('main.pages.blog', $sendData);
    }

    public function subscription(StoreSubscriptionRequest $request)
    {
        try {
            $request = $request->validated();
            Subscription::create($request);

            dd('ok');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function contact()
    {
        return view('main.pages.contact');
    }

    public function projects()
    {
        $projects = Project::whereStatus(true)->paginate(4);
        $sendData = [
            'projects' => $projects
        ];
        return view('main.pages.projects', $sendData);
    }

    public function project($slug)
    {
        $project = Project::whereSlug($slug)->first();

        $sendData = [
            'project' => $project
        ];
        return view('main.pages.project', $sendData);
    }

    public function contactMail(SendContactMailRequest $request)
    {
        Mail::send(new ContactMail($request->validated()));

        return redirect()->route('home')->with('sent', 'Mailiniz Ugurla Gonderildi');
    }
}
