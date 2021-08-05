<?php
namespace App\Http\Controllers;
use App\Provinsi;
use App\Kabupaten;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Http\Request;

class ComboboxController extends Controller
{
    public function index(){
        $provinsi = Provinsi::all();
        return view('view_combobox.index',['page_title'=>'Daftar Provinsi','provinsi'=>$provinsi]);
    }
    
	public function getKabupaten(Request $request){
        $kabupaten = Kabupaten::where("province_id",$request->proID)->pluck('id','name');
        return response()->json($kabupaten);
    }
	
	public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("city_id",$request->kabID)->pluck('id','name');
        return response()->json($kecamatan);
    }
	
    public function getKelurahan(Request $request){
        $kelurahan = kelurahan::where("district_id",$request->kecID)->pluck('id','name');
        return response()->json($kelurahan);
    }
}
