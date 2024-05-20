<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin/Category/index', compact('categories'));
    }

    public function create()
    {
        return view('admin/Category/create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Category::create($request->all());
        return redirect()->route('configuration.categories.index');
    }

    public function show(Category $category)
    {
        $subCategories = $category->subCategories;
        return view('admin/Category/show', compact('category', 'subCategories'));
    }
}

