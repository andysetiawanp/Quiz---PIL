<?php

namespace App\Http\Controllers\Api;

use App\Models\Presents;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $presents = Presents::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'presents berhasil ditambahkan',
            'data' => $presents
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'waktu_absen' => 'required|unique:presents|max:255',
            'mahasiswa_id' => 'required',
            'matakuliah_id' => 'required',
            'keterangan' => 'required',
            
        ]);

        Presents::find($id)->update([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan


        ]);

        if($presents)
        {
            return response()->json([
                'success' => true,
                'message' => 'presents berhasil ditambahkan',
                'data' => $presents
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'presents gagal ditambahkan',
                'data' => $presents
            ], 409);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
      {
        $presents = Presents::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'presents berhasil ditambahkan',
            'data' => $presents
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'waktu_absen' => 'required|unique:presents|max:255',
            'mahasiswa_id' => 'required',
            'matakuliah_id' => 'required',
            'keterangan' => 'required',
            
        ]);
         
        $presents = Presents::find($id)->update([
            'waktu_absen' => $request->waktu_absen,
            'mahasiswa_id' => $request->mahasiswa_id,
            'matakuliah_id' => $request->matakuliah_id,
            'keterangan' => $request->keterangan
        
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $presents
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Presents::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
