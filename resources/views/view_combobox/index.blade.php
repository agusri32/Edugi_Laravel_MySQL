@extends('layouts.style')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Dinamis
                </div>

                <div class="card-body">
                    <form method="post" action="{{ config('app.url') }}/prosesdata">
					@csrf
						<div class="row mb-3">
							<div class="col-3">
								<label  class="form-label">Kabupaten</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="kabupaten" id="kabupaten">
									<option selected>---Pilih Kabupaten/Kota---</option>
									@foreach ($kabupaten as $r_kab)
									<option  value="{{$r_kab->kab_kode}}">{{$r_kab->kab_nama}}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label  class="form-label">Kecamatan</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="kecamatan" id="kecamatan">
									<option selected>---Pilih Kecamatan---</option>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label  class="form-label">Desa</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="desa" id="desa">
									<option selected>---Pilih Desa---</option>
								</select>
							</div>
						</div>
						<button type="submit" class="btn btn-primary">Tambah Data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function () {
	
	//Lokasi: public/wilayah.js
	$('#kabupaten').change(function(){
    var kabID = $(this).val();    
    if(kabID){
        $.ajax({
           type:"GET",
           url:"{{ config('app.url') }}/getkecamatan?kabID="+kabID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kecamatan").empty();
                $("#desa").empty();
                $("#kecamatan").append('<option>---Pilih Kecamatan---</option>');
                $("#desa").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
               $("#desa").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#desa").empty();
    }  
   });

   $('#kecamatan').change(function(){
    var kecID = $(this).val();    
    if(kecID){
        $.ajax({
           type:"GET",
           url:"{{ config('app.url') }}/getdesa?kecID="+kecID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#desa").empty();
                $("#desa").append('<option>---Pilih Desa---</option>');
                $.each(res,function(nama,kode){
                    $("#desa").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#desa").empty();
            }
           }
        });
    }else{
        $("#desa").empty();
    }      
   });
   
});
</script>
@endpush