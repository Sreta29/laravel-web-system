<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderList;

class PayController extends Controller
{
    //
    public function index(Request $request, $id)
    {
        $order=OrderList::find($id);


        return view('admin/Pay/index', [
            'orderlists' => $order,
            
        ]);
    }

}
