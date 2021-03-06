<?php

namespace App\Http\Controllers\Backend\Category;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Facades\Lang;

class CategoryController extends Controller
{
    protected $category;
    
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $category = Category::whereNull('parent_id')->get();

        return view('backend.category.create', compact('category'));
    }

    public function create(StoreCategoryRequest $request)
    {     
        $NewCategory = $this->category->create($request->validated());     
        return redirect()->route('category.select')->with('status', lang::get('messages,succssefullCategory'));
    }

    public function select(Request $request)
    {
        $getCategory = $this->category->all();
        if ($request->ajax()) {
            $getCategory = Category::where('name', 'like', '%'.$request->name.'%')->get();
    		$view = view('backend.category.ajax.data',compact('getCategory'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('backend.category.select', compact('getCategory'));
    }

    public function edit(Request $request)
    {
        $getEditCategory = $this->category->all();
        $editCategory = Category::where('id', $request->id)->first();
        return view('backend.category.update', compact('editCategory','getEditCategory'));
    }

    public function update(StoreCategoryRequest $request)
    {
        $updateCategory = $this->category->update($request->validated(), $request->id);
        return redirect()->route('category.select');
    }

    public function delete(Request $request)
    {
        $deleteCategory = $this->category->delete($request->id);
        return redirect()->route('category.select');
    }
   
}
