<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::orderBy('id', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil ditampilkan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = validator::make($request->all(),[
            'judul' => 'required|string|max:255', // Judul harus berupa string dengan maksimal 255 karakter
            'penulis' => 'required|string|max:255', // Penulis harus berupa string dengan maksimal 255 karakter
            'penerbit' => 'required|string|max:255', // Penerbit harus berupa string dengan maksimal 255 karakter
            'tahun_terbit' => 'required|numeric|digits:4', // Tahun terbit harus berupa angka 4 digit (misalnya 2023)
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal Memasukkan Data',
                'errors' => $validator->errors()
            ], 422);
        }

        $data = Buku::create($validator->validated());
        return response()->json([
            'status' => 'success',
            'message' => 'Data buku berhasil diperbarui',
            'data' => $data
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Buku::find($id);
        if ($data){
            return response()->json([
                'status' => 'success',
                'message' => 'Data buku berhasil ditampilkan',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Data buku tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Buku::find($id);
        if ($data){
            $validator = validator::make($request->all(),[
                'judul' => 'required|string|max:255', // Judul harus berupa string dengan maksimal 255 karakter
                'penulis' => 'required|string|max:255', // Penulis harus berupa string dengan maksimal 255 karakter
                'penerbit' => 'required|string|max:255', // Penerbit harus berupa string dengan maksimal 255 karakter
                'tahun_terbit' => 'required|numeric|digits:4', // Tahun terbit harus berupa angka 4 digit (misalnya 2023)
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Gagal Memasukkan Data',
                    'errors' => $validator->errors()
                ], 422);
            }

            $data->update($validator->validated());
            return response()->json([
                'status' => 'success',
                'message' => 'Data buku berhasil diperbarui',
                'data' => $data
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Data buku tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::find($id);
        if ($data){
            $data->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Data buku berhasil dihapus',
            ], 200);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Data buku tidak ditemukan',
            ], 404);
        }
    }
}
