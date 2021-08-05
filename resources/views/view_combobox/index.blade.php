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
								<label  class="form-label">Provinsi</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="provinsi" id="provinsi">
									<option selected>== Pilih Provinsi ==</option>
									@foreach ($provinsi as $r_pro)
									<option  value="{{$r_pro->id}}">{{$r_pro->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						
						<div class="row mb-3">
							<div class="col-3">
								<label  class="form-label">Kabupaten / Kota</label>
							</div>
							<div class="col-9">
								<select class="form-control" name="kabupaten" id="kabupaten">
									<option selected>== Pilih Kabupaten / Kota ==</option>
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
	
	$('#provinsi').change(function(){
		var proID = $(this).val();    
		if(proID){
			$.ajax({
			   type:"GET",
			   url:"{{ config('app.url') }}/getkabupaten?proID="+proID,
			   dataType: 'JSON',
			   success:function(res){               
				if(res){
					$("#kabupaten").empty();
					$.each(res,function(nama,kode){
						$("#kabupaten").append('<option value="'+kode+'">'+nama+'</option>');
					});
				}else{
				   $("#kabupaten").empty();
				   $("#kecamatan").empty();
				}
			   }
			});
		}else{
			$("#kecamatan").empty();
			$("#kelurahan").empty();
		}  
	});
   
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