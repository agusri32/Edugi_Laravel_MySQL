@extends('layouts.style')

@section('content')

	@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br/>
	@endif
	
	<a href="{{ route('admin.create')}}" class="btn btn-primary">Tambah</a></td><br><br>
	<table class="table table-striped border">
    <thead>
        <tr>
          <td>No</td>
          <td>Nama</td>
          <td>Tempat Lahir</td>
          <td>Tanggal Lahir</td>
          <td>Gender</td>
          <td>Alamat</td>
          <td colspan="2">Kelola Data</td>
        </tr>
    </thead>
    <tbody>
        @foreach($result as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->nama}}</td>
            <td>{{$user->tempat_lahir}}</td>
            <td>{{$user->tanggal_lahir}}</td>
            <td>{{ucwords($user->gender)}}</td>
            <td>{{$user->alamat}}</td>
            <td align='right'>
				<a href="{{ route('admin.edit', $user->id)}}" class="btn btn-warning">Edit</a>
				<a href="{{ route('admin.show', $user->id)}}" class="btn btn-primary">Cetak</a>
			</td>
			<td align='left'>
                <form action="{{ route('admin.destroy', $user->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit" onClick="return confirm('Apakah Anda yakin akan menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
	</table>
	
	<a href="{{ config('app.url') }}/download/{{ Crypt::encryptString('../storage/fileuser/html.pdf') }}" class="btn btn-primary btn-rounded btn-fw" target="_blank" title="File yang telah terupload">
	<i class="fa fa-download"></i><font face="verdana" size="2">Download File</font>
	</a>
	
@endsection