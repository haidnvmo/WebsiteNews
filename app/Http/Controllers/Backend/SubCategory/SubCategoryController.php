<?php

namespace App\Http\Controllers\Backend\SubCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Models\Category;
use App\Http\Requests\SubCategory\StoreSubCategoryRequest;
use App\Repositories\SubCategoryRepository;
use Illuminate\Support\Facades\Lang;

class SubCategoryController extends Controller
{
    protected $subCategory;
    
    public function __construct(SubCategoryRepository $subCategory)
    {
        $this->subCategory = $subCategory;
    }

    public function index()
    {
        $getCategory = Category::get();
        return view('backend.subcategory.create',compact('getCategory'));
    }

    public function create(StoreSubCategoryRequest $request)
    {
        $NewCategory = $this->subCategory->create($request->validated());
        return redirect()->route('subcategory.select')->with('status', lang::get('messages,succssefullCategory'));
    }

    public function select(Request $request)
    {
        $subGetCategory = $this->subCategory->get();
        if ($request->ajax()) {
            $subGetCategory = SubCategory::where('name', 'like', '%'.$request->name.'%')->get();
    		$view = view('backend.subcategory.ajax.data',compact('subGetCategory'))->render();
            return response()->json(['html'=>$view]);
        }
        return view('backend.subcategory.select', compact('subGetCategory'));
    }

    public function edit(Request $request)
    {
        $editCategory = $this->subCategory->find($request->id)->first();
        return view('backend.subcategory.update', compact('editCategory'));
    }

    public function update(StoreSubCategoryRequest $request)
    {
        $updateCategory = $this->subCategory->update($request->validated(), $request->id);
        return redirect()->route('subcategory.select');
    }

    public function delete(Request $request)
    {
        $deleteCategory = $this->subCategory->delete($request->id);
        return redirect()->route('subcategory.select');
    }
}
