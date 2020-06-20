<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $categories = Category::paginate(10);
        return view('categories.index') -> with('categories', $categories);
    }

    public function create()
    {
        if (!Auth::user()->can('createCategory', Category::class)) {
            abort(403);
        }

        return view('categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        if(!Auth::user()->can('storeCategory')){
            abort(403);
        }

        $category = Category::create($request->all());
        return redirect(route('categories.index'));
    }

    public function edit(Category $category)
    {
        if(!Auth::user()->can('editCategory', $category)){
            abort(403);
        }

        return view('categories.edit') -> with('category', $category);
    }

    public function update(Category $category, Request $request)
    {
        if(!Auth::user()->can('updateCategory', $category)){
            abort(403);
        }

        $category -> fill($request -> all());
        $category -> save();
        return redirect(route('categories.index'));
    }

    public function delete(Category $category)
    {
        if(!Auth::user()->can('deleteCategory', $category)){
            abort(403);
        }

        $category -> delete();
        return redirect(route('categories.index'));
    }
}
