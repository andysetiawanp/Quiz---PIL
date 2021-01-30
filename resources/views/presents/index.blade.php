@extends('layouts.app')

@section('title', 'presents')
@section('content')
<a href="/presents/create" type="button" class="btn btn-secondary mb-2 btn-sm">Tambah Absensi</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Waktu Absen</th>
      <th scope="col">Mahasiswa Id</th>
      <th scope="col">Matakuliah Id</th>
      <th scope="col">Keterangan</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($presents as $present)
    <tr>
    <td>{{$present->waktu_absen}}</td>
    <td>{!!$present->mahasiswa_id !!}</td>
    <td>{!!$present->matakuliah_id !!}</td>
    <td>{!!$present->keterangan !!}</td>
 
    <td><a href="/presents/{{$present->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/presents/{{$present->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $presents -> links() }}
    </div>
@endsection