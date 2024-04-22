<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

/**
 * Class PeminjamansController
 * @package App\Http\Controllers
 */
class PeminjamanController
{
    /**
     * GET /peminjamans
     * @return array
     */
    public function index()
    {
        return Peminjaman::all();
    }

    public function show($id)
    {
        try {
            // return Peminjaman::findOrFail($id);
            return response()->json([
                'message' => 'Data peminjaman berhasil ditambahkan',
                'data' => Peminjaman::findOrFail($id)
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $peminjaman = Peminjaman::create($request->all());
        // return response()->json(['created' => true], 201, [
        //     'Location' => route('peminjamans.show', ['id' => $peminjaman->id])
        // ]);
        return response()->json([
            'message' => 'Data peminjaman berhasil ditambahkan',
            'data' => $peminjaman
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }

        $peminjaman->fill($request->all());
        $peminjaman->save();

        // return $peminjaman;
        return response()->json([
            'message' => 'Data peminjaman berhasil diperbarui',
            'data' => $peminjaman
        ], 200);
    }

    public function destroy($id)
    {
        try {
            $peminjaman = Peminjaman::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'message' => 'Peminjaman not found'
                ]
            ], 404);
        }

        $peminjaman->delete();
        // return response(null, 204);
        return response()->json([
            'message' => 'Data peminjaman berhasil dihapus',
        ], 200);
    }
}
