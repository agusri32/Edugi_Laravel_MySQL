<?php

namespace App\Http\Controllers;

//use App\AdminModel;
use Illuminate\Http\Request;
use DB;

class BukutamuController extends Controller
{
    public function index()
    {
        //$result = AdminModel::all();
		$result = DB::select('select * from bukutamu');
        return view('view_bukutamu.index', compact('result'));
    }
}
