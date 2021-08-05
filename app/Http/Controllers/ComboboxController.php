<?php
//Lokasi File: app/Http/Controllers/HomeController.php
namespace App\Http\Controllers;
use App\Kabupaten;
use App\Kecamatan;
use App\Desa;
use Illuminate\Http\Request;

class ComboboxController extends Controller
{
    public function index(){
        $kabupaten = Kabupaten::all();
        return view('view_combobox.index',['page_title'=>'Daftar Kabupaten','kabupaten'=>$kabupaten]);
    }
    public function getKecamatan(Request $request){
        $kecamatan = Kecamatan::where("kec_kab",$request->kabID)->pluck('kec_kode','kec_nama');
        return response()->json($kecamatan);
    }
    public function getDesa(Request $request){
        $desa = Desa::where("desa_kec",$request->kecID)->pluck('desa_kode','desa_nama');
        return response()->json($desa);
    }
}
