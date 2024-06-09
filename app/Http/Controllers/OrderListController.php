<?php

namespace App\Http\Controllers;

use App\Models\OrderList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('search');
        $user = Auth::user();

        $orderlistQuery = OrderList::query(); // Start a base query

        if ($user->role == 'User') {
            $orderlistQuery->where('userid', $user->id);
        } elseif ($user->role == 'Wastage Collector') {
            $orderlistQuery->where('collector', $user->name);
        }

        // Apply search conditions
        $orderlistQuery->where(function($q) use ($query) {
            $q->where('orderid', 'like', '%' . $query . '%')
            ->orWhere('zone', 'like', '%' . $query . '%')
            ->orWhere('email', 'like', '%' . $query . '%');
        });

        $orderlist = $orderlistQuery->get();

        return view('admin/OrderList/index', [
            'orderlists' => $orderlist,
            'search' => $query
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function create()
    {
        $collectors = User::where('role','Wastage Collector')->get();
        return view('admin/OrderList/create', ['collectors' => $collectors]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'orderid' => 'nullable',
            'orderdate' => 'required',
            'zone' => 'required',
            'email' => 'required',
            'collectdate' => 'nullable',
            'collector' => 'nullable',
            'status' => 'nullable',
            'add_address' => 'required',
            'wastetype_id' => 'nullable',
            'userid' => 'nullable',
        ]);

        $user = Auth::user();

        $validated['userid'] = $user->id;

        $validated['orderid'] = OrderList::generateCustomOrderId();

        OrderList::create($validated);

        return redirect()->route('configuration.orderlist.index')->with('success', 'Order List created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function edit(string $id)
    {
        $orderlist = OrderList::find($id);
        $collectors = User::where('role','Wastage Collector')->get();
        return view('admin/OrderList/edit',['orderlist' => $orderlist, 'collectors' => $collectors]);
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
            'orderid' => 'nullable',
            'orderdate' => 'required',
            'zone' => 'required',
            'email' => 'required',
            'collectdate' => 'nullable',
            'collector' => 'nullable',
            'status' => 'nullable',
            'add_address' => 'required',
            'wastetype_id' => 'nullable'
        ]);

        $orderlist = OrderList::find($id);

        $orderlist->update($validated);

        return redirect()->route('configuration.orderlist.index')->with('success', 'Order List updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $orderlist = OrderList::find($id);
        $orderlist->delete();

        return redirect()->route('configuration.orderlist.index')->with('success', 'Order List deleted successfully');
    }
}
