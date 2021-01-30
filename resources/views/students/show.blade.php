@extends('layouts.app')

@section('title', 'students')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Nama Mahasiswa : {{ $student['nama'] }}</h3>
                <h3>Alamat : {{ $student['alamat'] }}</h3>
                <h3>NO Telepon : {{ $student['no_tlp'] }}</h3>
                <h3>Email  : {{ $student['email'] }}</h3>
                
    </div>
</div>
@endsection