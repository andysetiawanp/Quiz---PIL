@extends('layouts.app')

@section('title', 'course')
@section('content')
<a href="/courses/create" type="button" class="btn btn-secondary mb-2 btn-sm">Tambah Matakuliah</a>
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Nama Matakuliah</th>
      <th scope="col">SKS</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  @foreach ($courses as $course)
    <tr>
    <td>{{$course->nama_matakuliah}}</td>
    <td>{!!$course->sks !!}</td>

    <td><a href="/courses/{{$course->id}}/edit"><button type="button" class="btn btn-outline-secondary">Edit</a></button></td>
    <form action="/courses/{{$course->id}}" method="POST">
    @csrf
    @method('DELETE')
    <td><button class="btn btn-outline-secondary">Delete</button></td>
    </form>
    </tr>
    @endforeach
  </tbody>
</table>
<div>
    {{ $courses -> links() }}
    </div>
@endsection