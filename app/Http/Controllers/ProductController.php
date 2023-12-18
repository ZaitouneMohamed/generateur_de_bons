<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function index()
    {
        return view('products');
    }

    public function ImportProducts(Request $request)
    {
        request()->validate([
            'product' => 'required|mimes:xlx,xlsx|max:2048'
        ]);
        Excel::import(new ProductImport, $request->file('product'));
        return back()->with('massage', 'User Imported Successfully');
    }

    public function ClearTable()
    {
        Product::truncate();
        return back()->with('massage', 'Table Cleared Successfully');
    }
}
