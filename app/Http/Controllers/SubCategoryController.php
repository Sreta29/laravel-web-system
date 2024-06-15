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

    public function store(Request $request, $category)
    {
        $validated = $request->validate(['name' => 'required','category_id' => 'nullable']);
        $validated['category_id'] = $category;
        SubCategory::create($validated);
        // $category->subCategories()->create($request->all());
        return redirect()->route('configuration.categories.show', $category);
    }

    public function destroy(string $id)
    {
        $subcategories = SubCategory::find($id);
        $subcategories->delete();

        return redirect()->route('dashboard')->with('success', 'Sub Category deleted successfully');
    }
}

