<?php

namespace App\Http\Controllers;
use App\models\presents;

use Illuminate\Http\Request;

class PresentController extends controller
{
    
public function index()
{
    $presents = presents::OrderBy('id', 'desc')->paginate(3);

    return view('presents.index', compact('presents'));
}
public function create()
{
    return view('presents.create');
}
public function store(Request $request )
{
    // validate the request...
    $request->validate([
        'waktu_absen' => 'required|unique:presents|max:255',
        'mahasiswa_id' => 'required',
        'matakuliah_id' => 'required',
        'keterangan' => 'required',

    ]);

    $presents = new presents;

    $presents->waktu_absen = $request->waktu_absen; 
    $presents->mahasiswa_id = $request->mahasiswa_id; 
    $presents->matakuliah_id = $request->matakuliah_id;
    $presents->keterangan = $request->keterangan;

    $presents->save();

        return redirect('/presents');
    }

    public function show($id)
    {
        $presents = presents::where('id', $id)->first();
        return view('presents.show', ['present' => $present]);
    }

    public function edit($id)
    {
        $present = presents::where('id', $id)->first();
        return view('presents.edit', ['present' => $present]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'waktu_absen' => 'required|unique:presents|max:255',
        'mahasiswa_id' => 'required',
        'matakuliah_id' => 'required',
        'keterangan' => 'required',

    ]);

    presents::find($id)-> update([

            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/presents');
    }
    public function destroy($id)
    {
        presents::find($id)->delete();
        return redirect('/presents');
    }
}