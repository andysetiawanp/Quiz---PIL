@extends('layouts.app')

@section('title', 'presents')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Waktu Absen : {{ $present['waktu_absen'] }}</h3>
                <h3>Mahasiswa Id : {{ $present['mahasiswa_id'] }}</h3>
                <h3>Matakuliah Id : {{ $present['matakuliah_id'] }}</h3>
                <h3>Keterangan : {{ $present['keterangan'] }}</h3>
                
    </div>
</div>
@endsection