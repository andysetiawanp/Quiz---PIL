<?php

namespace App\Http\Controllers;
use App\models\courses;

use Illuminate\Http\Request;

class CoursesController extends controller
{
    
public function index()
{
    $courses = courses::OrderBy('id', 'desc')->paginate(3);

    return view('courses.index', compact('courses'));
}
public function create()
{
    return view('courses.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'nama_matakuliah' => 'required|unique:courses|max:255',
        'sks' => 'required',

    ]);

    $courses = new courses;

    $courses->nama_matakuliah = $request->nama_matakuliah;
    $courses->sks = $request->sks;

    $courses->save();

        return redirect('/courses');
    }

    public function show($id)
    {
        $course = courses::where('id', $id)->first();
        return view('courses.show', ['course' => $course]);
    }

    public function edit($id)
    {
        $course = courses::where('id', $id)->first();
        return view('courses.edit', ['course' => $course]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nama_matakuliah' => 'required|unique:courses|max:255',
        'sks' => 'required',

    ]);

    courses::find($id)-> update([

            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks
            
        ]);

        return redirect('/courses');
    }
    public function destroy($id)
    {
        courses::find($id)->delete();
        return redirect('/courses');
    }
}