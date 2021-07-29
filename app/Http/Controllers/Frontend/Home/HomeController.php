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
        $getPost = Post::orderBy('created_at', 'DESC')->first();
        $getPostData = Post::orderBy('created_at', 'DESC')->paginate(6);
        $getPostHighLights = Post::where('sort','=', Post::POST_HIGHLIGHTS)->take(3)->get();
        $getPostNews = Post::where('sort','=', Post::POST_NEWS)->take(3)->get();
        
        $getPostHotNews = Post::getNewsOfCategory(Post::POST_HOTNEWS)->first();
        if($getPostHotNews) {
           $getPostHotNews1 = Post::getNewsOfCategory(Post::POST_HOTNEWS)->orderBy('created_at', 'DESC')->take(3)->get();
        }
        $getPostSport = Post::getNewsOfCategory(Post::POST_SPORT)->first();
        if($getPostSport) {
            $getPostSport1 = Post::getNewsOfCategory(Post::POST_SPORT)->orderBy('created_at', 'DESC')->take(3)->get();
        }
        $getPostCultural = Post::getNewsOfCategory(Post::POST_CULTURAL)->first();
        if($getPostCultural) {
            $getPostCultural1 = Post::getNewsOfCategory(Post::POST_CULTURAL)->orderBy('created_at', 'DESC')->take(3)->get();
        }
        
        // dd($a);
        // $getPostSport = Post::with(['categories' => function ($query) {
        //     $query->where('id', '=', 5);
        // }])->first();
        // if($getPostSport){
        //     $getPostSport1 = Post::with(['categories' => function ($query) {
        //         $query->where('id', 5);}])->whereNotIn('id', [$getPostSport->id])->orderBy('created_at', 'DESC')->take('3')->get();
        // }
        // $getPostHotNews = Post::with('categories')->where('id_category', '=', Post::POST_HOTNEWS)->first();
        // if($getPostHotNews){

        // }
        
        return view('frontend.home.index', compact(['getPost','getPostData','getPostHighLights', 'getPostNews','getPostHotNews','getPostHotNews1','getPostSport','getPostSport1','getPostCultural','getPostCultural1']));
    }
    public function detail(Request $request) {
        $getDetail = Post::where('slug', '=', $request->slug)->first();
        return view('frontend.detail.index', compact('getDetail'));
    }
}
