<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;


class HomeController extends Controller
{
    public function index(Request $request)
    {

        $getPost = Post::orderBy('created_at', 'DESC')->take(1)->first();

        $getPostData = Post::with('categories')->whereNotIn('id', [$getPost->id])->orderBy('created_at', 'DESC')->paginate(4);
        $getPostHighLights = Post::where('sort', '=', Post::POST_HIGHLIGHTS)->orderBy('created_at', 'DESC')->take(3)->get();
        $getPostNews = Post::where('sort', '=', Post::POST_NEWS)->take(3)->get();

        $getPostHotNews = Post::getNewsOfCategory(Post::POST_HOTNEWS)->first();
        if($getPostHotNews){
            $getPostHotNews1 = Post::where('id_category', Post::POST_HOTNEWS)->whereNotIn('id', [$getPostHotNews->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }
        

        $getPostSport = Post::getNewsOfCategory(Post::POST_SPORT)->first();
        if($getPostSport){
            $getPostSport1 = Post::where('id_category', Post::POST_SPORT)->whereNotIn('id', [$getPostSport->id])->orderBy('created_at', 'DESC')->take(3)->get();

        }

        $getPostCultural = Post::getNewsOfCategory(Post::POST_CULTURAL)->first();
        if($getPostCultural){
            $getPostCultural1 = Post::where('id_category', Post::POST_CULTURAL)->whereNotIn('id', [$getPostCultural->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }

        return view('frontend.home.index', compact(['getPost', 'getPostData', 'getPostHighLights', 'getPostNews', 'getPostHotNews', 'getPostHotNews1', 'getPostSport', 'getPostSport1', 'getPostCultural', 'getPostCultural1']));
    }
    public function detail(Request $request)
    {
        $getDetail = Post::with('categories')->where('slug', '=', $request->slug)->orderBy('created_at', 'DESC')->first();
        if(!$getDetail){
            abort(404);
        }
        $getPostHighLights = Post::where('sort', Post::POST_HIGHLIGHTS)->orderBy('created_at', 'DESC')->take('5')->get();
        return view('frontend.detail.index', compact('getDetail','getPostHighLights'));
    }
    public function category(Request $request)
    {
        $category = Category::where('slug', $request->slug)->first();
        if (!$category) {
            abort(404);
        }
        $posts = Post::where('id_category', $category->id)->get();
        $getPostHighLights = Post::where('sort', Post::POST_HIGHLIGHTS)->orderBy('created_at', 'DESC')->take('5')->get();
        $getPostNews = Post::where('sort', '=', Post::POST_NEWS)->orderBy('created_at', 'DESC')->take(5)->get();
        return view('frontend.category.in', compact('posts', 'category','getPostHighLights','getPostNews'));
    }
}
