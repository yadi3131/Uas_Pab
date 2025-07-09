<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = ['buku_id', 'peminjam', 'tanggal_pinjam', 'tanggal_kembali'];

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }
}