<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class DropdownController extends Controller
{
    public function index()
    {
        $provinsi = Province::pluck('name', 'id');

        return view('view_dropdown.index', [
            'provinsi' => $provinsi,
        ]);
    }

    public function carikota(Request $request)
    {
		$selectedKota = 3172;
        $datakota = City::where('province_id', $request->get('idp'))
            ->pluck('name', 'id');

        return response()->json($datakota);
    }
	
	public function caricamat(Request $request)
    {
        $datacamat = District::where('city_id', $request->get('idk'))
            ->pluck('name', 'id');

        return response()->json($datacamat);
    }
	
	public function carilurah(Request $request)
    {
        $datalurah = Village::where('district_id', $request->get('idl'))
            ->pluck('name', 'id');

        return response()->json($datalurah);
    }
	
	public function prosesdata(Request $request)
    {
        echo "ID Provinsi : ".$request->get('provinsi');
		echo "<br>";
		echo "ID Kota : ".$request->get('kota');
		echo "<br>";
		echo "ID Kecamatan : ".$request->get('kecamatan');
		echo "<br>";
		echo "ID Kelurahan : ".$request->get('kelurahan');
    }
}
