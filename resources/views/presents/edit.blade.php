@extends('layouts.app')

@section('title', 'presents')

@section('content')

<form action="/presents/{{ $present['id'] }}" method="POST">
  @csrf
  @method('PUT')
  <div class="form-group">
    <label for="exampleInputEmail1">Waktu Absen</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="waktu_absen" aria-describedby="emailHelp" value="{{ old('waktu_absen') ? old('waktu_absen') : $present['waktu_absen'] }}">
    @error('waktu_absen')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mahasiswa Id</label>
    <input type="text" class="form-control" name="mahasiswa_id" id="exampleInputPassword1" value="{{ old('mahasiswa_id') ? old('mahasiswa_id') : $present['mahasiswa_id'] }}">
    @error('mahasiswa_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Matakuliah Id</label>
    <input type="text" class="form-control" name="matakuliah_id" id="exampleInputPassword1" value="{{ old('matakuliah_id') ? old('matakuliah_id') : $present['matakuliah_id'] }}">
    @error('matakuliah_id')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Keterangan</label>
    <input type="text" class="form-control" name="keterangan" id="exampleInputPassword1" value="{{ old('keterangan') ? old('keterangan') : $present['keterangan'] }}">
    @error('keterangan')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection