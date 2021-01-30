@extends('layouts.app')

@section('title', 'course')

@section('content')
<div class="card">
    <div class="card-body">
                <h3>Nama Matakuliah : {{ $course['nama_matakuliah'] }}</h3>
                <h3>SKS : {{ $course['sks'] }}</h3>
               
    </div>
</div>
@endsection
