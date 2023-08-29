<?php

namespace App\Http\Controllers;

use App\Imports\OrderImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
// use Maatwebsite\Excel\Facades\Excel;


class HomeController extends Controller
{
    public function upload(Request $request)
    {
        request()->validate([
            'orders' => 'required|mimes:xlx,xlsx|max:2048'
        ]);
        Excel::import(new OrderImport, $request->file('orders'));
        return back()->with('massage', 'User Imported Successfully');
    }
    public function clear()
    {
        DB::table('orders')->delete();
        return redirect()->back()->with([
            "success" => "table cleared successfly"
        ]);
    }

    public function SetNomeroCommand(Request $request)
    {
        $this->validate($request, [
            "numero" => "required|numeric"
        ]);
        Config::set('app.command_number', "5");
        dd(config('app.command_number'));
        // return redirect()->back();
    }
}
