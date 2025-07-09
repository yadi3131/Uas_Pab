<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        return Peminjaman::with('buku')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => 'required|exists:bukus,id',
            'peminjam' => 'required|string',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        return Peminjaman::create($request->all());
    }

    public function show(Peminjaman $peminjaman)
    {
        return $peminjaman->load('buku');
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $peminjaman->update($request->all());
        return $peminjaman;
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}