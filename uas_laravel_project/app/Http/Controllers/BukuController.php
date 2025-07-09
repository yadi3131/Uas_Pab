<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        return Buku::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string',
            'pengarang' => 'required|string',
            'penerbit' => 'required|string',
            'tipe' => 'required|in:fiksi,non fiksi',
        ]);

        return Buku::create($request->all());
    }

    public function show(Buku $buku)
    {
        return $buku;
    }

    public function update(Request $request, Buku $buku)
    {
        $buku->update($request->all());
        return $buku;
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return response()->json(['message' => 'Deleted successfully']);
    }
}