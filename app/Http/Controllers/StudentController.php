<?php

namespace App\Http\Controllers;
use App\models\students;
use Illuminate\Http\Request;

class StudentController extends controller
{
    
public function index()
{
    $students = students::OrderBy('id', 'desc')->paginate(3);

    return view('students.index', compact('students'));
}
public function create()
{
    return view('students.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'nama_mahasiswa' => 'required|unique:students|max:255',
        'no_tlp' => 'required',
        'email' => 'required',
        'alamat' => 'required',

    ]);

    $students = new students;

    $students->nama_mahasiswa = $request->nama_mahasiswa;
    $students->no_tlp = $request->no_tlp;
    $students->email = $request->email; 
    $students->alamat = $request->alamat;

    $students->save();

        return redirect('/students');
    }

    public function show($id)
    {
        $student = students::where('id', $id)->first();
        return view('students.show', ['student' => $student]);
    }

    public function edit($id)
    {
        $student = students::where('id', $id)->first();
        return view('students.edit', ['student' => $student]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nama_mahasiswa' => 'required|unique:students|max:255',
        'no_tlp' => 'required',
        'email' => 'required',
        'alamat' => 'required',

    ]);

        students::find($id)-> update([

            'nama_mahasiswa' => $request->nama_mahasiswa,
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'alamat' => $request->alamat
        ]);

        return redirect('/students');
    }
    public function destroy($id)
    {
        students::find($id)->delete();
        return redirect('/students');
    }
}