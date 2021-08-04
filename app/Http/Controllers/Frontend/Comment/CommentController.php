<?php

namespace App\Http\Controllers\Frontend\Comment;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use App\Repositories\CommentRepository;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;
use Auth;


class CommentController extends Controller
{
    protected $comment;
    public function __construct(CommentRepository $comment)
    {
        $this->comment = $comment;
    }
    public function createComment(StoreCommentRequest $request)
    {
        $addComment = $this->comment->create($request->validated());
        $post = Post::where('id', $request->id_posts)->first();
        $addComment->id_posts = $request->id_posts;
        $addComment->id_customer = Auth::guard('customer')->user()->id;    
        $addComment->save();
       
        return redirect()->route('home.detail', $post->slug);
    }

}
