@extends('layouts.style')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    From Dinamis dengan Laravolt
                </div>

                <div class="card-body">
                    <form method="post" action="{{ config('app.url') }}/prosesdata">
					@csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label">Provinsi</label>
                            <div class="col-md-9">
                                <select name="provinsi" id="provinsi" class="form-control">
                                    <option value="">== Pilih Provinsi ==</option>
                                    @foreach ($provinsi as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label">Kabupaten / Kota</label>
                            <div class="col-md-9">
                                <select name="kota" id="kota" class="form-control">
                                    <option value="">== Pilih Kabupaten / Kota ==</option>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label">Kecamatan</label>
                            <div class="col-md-9">
                                <select name="kecamatan" id="kecamatan" class="form-control">
                                    <option value="">== Pilih Kecamatan ==</option>
                                </select>
                            </div>
                        </div>
						
						<div class="form-group row">
                            <label for="name" class="col-md-3 col-form-label">Kelurahan / Desa</label>
                            <div class="col-md-9">
                                <select name="kelurahan" id="kelurahan" class="form-control">
                                    <option value="">== Pilih Kelurahan / Desa ==</option>
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
	
    $('#provinsi').on('change', function () {
        axios.post('{{ config('app.url') }}/carikota', {idp: $(this).val()})
		.then(function (response) {
			$('#kota').empty();

			$.each(response.data, function (id, name) {
				$('#kota').append(new Option(name, id))
			})
		});
    });
	
	$('#kota').on('change', function () {
        axios.post('{{ config('app.url') }}/caricamat', {idk: $(this).val()})
		.then(function (response) {
			$('#kecamatan').empty();

			$.each(response.data, function (id, name) {
				$('#kecamatan').append(new Option(name, id))
			})
		});
    });
	
	$('#kecamatan').on('change', function () {
        axios.post('{{ config('app.url') }}/carilurah', {idl: $(this).val()})
		.then(function (response) {
			$('#kelurahan').empty();

			$.each(response.data, function (id, name) {
				$('#kelurahan').append(new Option(name, id))
			})
		});
    });

});
</script>
@endpush
