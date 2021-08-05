<?php

namespace App\Http\Controllers;
use App\DataUser;
use Illuminate\Http\Request;
use DB;

class Select2Controller extends Controller
{
    public function index()
    {
    	return view('view_select2/index');
    }

    public function browse(Request $request){
        $data = DataUser::whereRaw("(name LIKE '%".$request->get('q')."%')")
                ->limit(30)
                ->get();
        return response()->json($data);
    }
}