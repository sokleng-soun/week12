<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryStoreRequest;

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
        return view('categories.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        $category = Category::create($request->all());
        return redirect(route('categories.index'));
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if(empty($category)){
            return redirect(route('categories.index'));
        }
        return view('categories.edit') -> with('category', $category);
    }

    public function update($id, Request $request)
    {
        $category = Category::find($id);
        if(empty($category)){
            return redirect(route('categories.index'));
        }
        $category -> fill($request -> all());
        $category -> save();
        return redirect(route('categories.index'));
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if(empty($category)){
            return redirect(route('categories.index'));
        }
        $category -> delete();
        return redirect(route('categories.index'));
    }
}
