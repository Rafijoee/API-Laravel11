<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::orderBy('id', 'asc')->get();
        return response()->json([
            'status' => 'success',
            'message' => 'Data post berhasil ditampilkan',
            'data' => PostResource::collection($data)
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Post::with('user:id,username')->findOrFail($id);
        if ($data) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data post berhasil ditampilkan',
                'data' => new PostResource($data)
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data post tidak ditemukan',
            ], 404);
        }
    }
    public function show2(string $id)
    {
        $data = Post::findOrFail($id); //eager loading
        if ($data) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data post berhasil ditampilkan',
                'data' => new PostResource($data)
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data post tidak ditemukan',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
