<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function create(Category $category)
    {
        
        return view('admin/SubCategory/create', compact('category'));
    }

    public function store(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);
        $category->subCategories()->create($request->all());
        return redirect()->route('configuration.categories.show', $category);
    }
}

