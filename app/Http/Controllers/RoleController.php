<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $role = Role::where('rolename', 'like', '%' . $query . '%')->orWhere('roleid', 'like', '%' . $query . '%')->get();
        return view('admin/Admins/index',[
            'roles' => $role,
            'search' => $query
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        return view('admin/Admins/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'roleid' => 'required',
            'rolename' => 'required',
            'status' => 'nullable'
        ]);

        Role::create($validated);

        return redirect()->route('configuration.admins.index')->with('success', 'User Role reated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $role = Role::find($id);
        return view('admin/Admins/edit',['role' => $role]);
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
        $validated = $request->validate([
            'roleid' => 'required',
            'rolename' => 'required',
            'status' => 'nullable'
        ]);

        $role = Role::find($id);

        $role->update($validated);

        return redirect()->route('configuration.admins.index')->with('success', 'User Role updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::find($id);
        $role->delete();

        return redirect()->route('configuration.admins.index')->with('success', 'User Role deleted successfully');
    }
}