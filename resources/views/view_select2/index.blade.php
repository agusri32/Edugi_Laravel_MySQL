@extends('layouts.style')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Select2 Ajax Demo
                </div>

                <div class="card-body">
                    <form>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label">Name</label>
                            <div class="col-md-6">
                               <select name="select" class="form-control select2"></select>
							</div>
                        </div>
                    </form>
                </div>
				
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function() {
		$('.select2').select2({
			placeholder: 'Nama Peserta',
			minimumInputLength: 3,
			ajax: {
				url: "<?=url('/browse');?>",
				dataType: 'json',
				delay: 250,
				data: function (params) {
						return {
							q: params.term
							//tambahkan parameter lainnya di sini jika ada
						}
				},
				processResults: function (data) {
					return {
						results:  $.map(data, function (item) {
								return {
									text: item.name+ ' - ' + item.email,
									id: item.id
								}
							})
					};
				},
				cache: true
			},
			templateSelection: function (selection) {
				var result = selection.text.split('-');
				return result[0];
			}
		});
	});
</script>
@endpush
