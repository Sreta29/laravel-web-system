<?php

namespace App\Http\Controllers;

use App\Models\ConfigurationCode;
use Illuminate\Http\Request;

class ConfigurationCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = ConfigurationCode::where('parent_id',0)->get();
        // dd($categories);
        return view('admin/Category/ConfigurationCode',[
            'listcategories' => $categories
        ]);
    }


    public function create_category($category)
    {
        $categories = ConfigurationCode::where('category',$category)->get();
        // dd($categories);
        return view('admin/Category/listCategory',[
            'category'=> $category,
            'listcategories' => $categories
        ]);
    }

    public function create()
    {
        return view('admin/Category/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'category' => 'required',
            'status' => 'nullable'
        ]);
        // dd($validated);

        ConfigurationCode::create($validated);

        return redirect()->route('configuration.category.index')->with('success', 'Configuration Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $category)
    {
        $categories = ConfigurationCode::where('category',$category)->get();
        $categories->delete();

        return redirect()->route('configuration.category.index')->with('error', 'Successful delete');
    }
}
