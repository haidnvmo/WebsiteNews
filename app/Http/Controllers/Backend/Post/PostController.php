<?php

namespace App\Http\Controllers\Backend\Post;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Lang;
use App\Http\Requests\Post\StorePostRequest;
use Auth;

class PostController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('backend.post.create', compact('categories'));
    }

    public function create(StorePostRequest $request)
    {
        $data = $request->validated();
        // $data['sort'] = $request['sort'];
        // Handle file Upload
        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('image')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $request->file('image')->storeAs('public/avatars', $fileNameToStore);

            $data['image'] = $fileNameToStore;
        }
        $NewPost = Post::create($data);
        return redirect()->route('post.select');
    }

    public function select(Request $request)
    {
        
        $getAllPost = Post::with('categories')->get();

        if ($request->ajax()) {
            $getAllPost = Post::where('title', 'like', '%'.$request->title.'%')->get();
    		$view = view('backend.post.ajax.data',compact('getAllPost'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('backend.post.select', compact('getAllPost'));
    }

    public function edit(Request $request)
    {
        $category = Category::get();
        $editPost = Post::where('id', '=', $request->id)->first();
        if(!$editPost) {
            abort(404);
        }
        return view('backend.post.update', compact('editPost', 'category'));
    }

    public function update(StorePostRequest $request)
    {

        $updatePost = Post::where('id', '=', $request->id)->first();

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $request->file('image')->storeAs('public/avatars', $fileNameToStore);

            $updatePost['image'] = $fileNameToStore;
        }
        $updatePost->title = $request->get('title');
        $updatePost->description = $request->get('description');
        $updatePost->content = $request->get('content');
        $updatePost->slug = $request->get('slug');
        $updatePost->id_category = $request->get('id_category');
        $updatePost->save();
        return redirect()->route('post.select');
    }

    public function delete(Request $request)
    {
        $deletePost = Post::where('id', '=', $request->id)->first();
        $deletePost->delete();
        return redirect()->route('post.select');
    }

    public function search(Request $request)
    {
        // $search = $request['name'];
        // $data = Post::where('title', 'LIKE', "%{$search}%")->get();
        // return response()->json([
        //     'data' => $data,             
        // ]);
        // $getAllPost =  Post::where('title','LIKE','%'.$request->title.'%')->get();
        // return view('backend.post.select',compact('getAllPost'));

    }
}
