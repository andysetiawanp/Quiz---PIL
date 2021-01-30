<?php

namespace App\Http\Controllers\Api;

use App\Models\Courses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::orderBy('id', 'desc')->paginate(3);

        return response()->json([
            'success' => true,
            'message' => 'courses berhasil ditambahkan',
            'data' => $courses
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
            'nama_matakuliah' => 'required|unique:courses|max:255',
            'sks' => 'required',
            
        ]);

        Courses::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks


        ]);

        if($courses)
        {
            return response()->json([
                'success' => true,
                'message' => 'courses berhasil ditambahkan',
                'data' => $courses
            ], 200);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'courses gagal ditambahkan',
                'data' => $courses
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
        $courses = Courses::where('id', $id)->first();
        return response()->json([
            'success' => true,
            'message' => 'courses berhasil ditambahkan',
            'data' => $courses
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
            'nama_matakuliah' => 'required|unique:courses|max:255',
            'sks' => 'required',
            
        ]);
         
        $courses = Courses::find($id)->update([
            'nama_matakuliah' => $request->nama_matakuliah,
            'sks' => $request->sks
        
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $courses
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
        $cek = Courses::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Deleted',
            'data' => $cek
        ], 200);
    }
}
