<?php

namespace App\Http\Controllers\Frontend\Home;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;


class HomeController extends Controller
{
    public function index(Request $request)
    {

        $getPost = Post::where('status', '=', '1')->orderBy('created_at', 'DESC')->take(1)->first();

        $getPostData = Post::with('categories')->whereNotIn('id', [$getPost->id])->where('status', '=', '1')->orderBy('created_at', 'DESC')->paginate(4);
        $getPostHighLights = Post::where('sort', '=', Post::POST_HIGHLIGHTS)->orwhere('status', '=', '1')->orderBy('created_at', 'DESC')->take(3)->get();
        $getPostNews = Post::where('sort', '=', Post::POST_NEWS)->orwhere('status', '=', '1')->take(3)->get();

        $getPostHotNews = Post::getNewsOfCategory(Post::POST_HOTNEWS)->first();
        if($getPostHotNews){
            $getPostHotNews1 = Post::where('id_category', Post::POST_HOTNEWS)->whereNotIn('id', [$getPostHotNews->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }
        

        $getPostSport = Post::getNewsOfCategory(Post::POST_SPORT)->where('status', '=', '1')->first();
        if($getPostSport){
            $getPostSport1 = Post::where('id_category', Post::POST_SPORT)->orWhere('status', '=', '1')->whereNotIn('id', [$getPostSport->id])->orderBy('created_at', 'DESC')->take(3)->get();

        }

        $getPostCultural = Post::getNewsOfCategory(Post::POST_CULTURAL)->first();
        if($getPostCultural){
            $getPostCultural1 = Post::where('id_category', Post::POST_CULTURAL)->whereNotIn('id', [$getPostCultural->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }
        $getPostProject = Post::getNewsOfCategory(Post::POST_PROJECT)->first();
        if($getPostProject){
            $getPostProject1 = Post::where('id_category', Post::POST_PROJECT)->whereNotIn('id', [$getPostProject->id])->orderBy('created_at', 'DESC')->take(3)->get();
        }

        return view('frontend.home.index', compact(['getPost', 'getPostData', 'getPostHighLights', 'getPostNews', 'getPostHotNews', 'getPostHotNews1', 'getPostSport',
         'getPostSport1', 'getPostCultural', 'getPostCultural1', 'getPostProject', 'getPostProject1']));
    }
    public function detail(Request $request)
    {
        $getDetail = Post::with('categories')->where('slug', '=', $request->slug)->orderBy('created_at', 'DESC')->first();
        if(!$getDetail){
            abort(404);
        }
        $getPostHighLights = Post::where('sort', Post::POST_HIGHLIGHTS)->orderBy('created_at', 'DESC')->take('5')->get();
        $getPostComment = Post::where('slug', $request->slug)->first();
        $getComment = Comment::with('customer')->where('id_posts', $getPostComment->id)->get();

        return view('frontend.detail.index', compact('getDetail','getPostHighLights','getComment'));
    }
    public function category(Request $request)
    {
        $category = Category::where('slug', $request->slug)->first();
        if (!$category) {
            abort(404);
        }
        $posts = Post::where('id_category', $category->id)->orwhere('status', '=', '1')->orderby('created_at', 'DESC')->paginate(3);
        
        $getPostHighLights = Post::where('sort', Post::POST_HIGHLIGHTS)->orderBy('created_at', 'DESC')->take('5')->get();
        $getPostNews = Post::where('sort', '=', Post::POST_NEWS)->orderBy('created_at', 'DESC')->take(5)->get();
        return view('frontend.category.in', compact('posts', 'category','getPostHighLights','getPostNews'));
    }
}
