@extends('layouts.style')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Form Dinamis dengan Ajax
                </div>

                <div class="card-body">
                    <form method="post" action="{{ config('app.url') }}/prosesdata">
					@csrf
						<div class="row mb-3">
							<div class="col-3">
								<label  class="form-label">Kabupaten / Kota</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="kota" id="kota">
									<option selected>== Pilih Kabupaten / Kota ==</option>
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
									<option selected>== Pilih Kecamatan ==</option>
								</select>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-3">
								<label  class="form-label">Kelurahan / Desa</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="kelurahan" id="kelurahan">
									<option selected>== Pilih Kelurahan / Desa ==</option>
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
	
	$('#kota').change(function(){
    var kabID = $(this).val();    
    if(kabID){
        $.ajax({
           type:"GET",
           url:"{{ config('app.url') }}/getkecamatan?kabID="+kabID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kecamatan").empty();
                $.each(res,function(nama,kode){
                    $("#kecamatan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kecamatan").empty();
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kecamatan").empty();
        $("#kelurahan").empty();
    }  
   });

   $('#kecamatan').change(function(){
    var kecID = $(this).val();    
    if(kecID){
        $.ajax({
           type:"GET",
           url:"{{ config('app.url') }}/getkelurahan?kecID="+kecID,
           dataType: 'JSON',
           success:function(res){               
            if(res){
                $("#kelurahan").empty();
                $.each(res,function(nama,kode){
                    $("#kelurahan").append('<option value="'+kode+'">'+nama+'</option>');
                });
            }else{
               $("#kelurahan").empty();
            }
           }
        });
    }else{
        $("#kelurahan").empty();
    }      
   });
   
});
</script>
@endpush