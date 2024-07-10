<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;
    protected $table = 'surats';
    protected $fillable = ['nomor_surat','judul','kategori_surat_id','file'];


    public function kategoriSurat()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_surat_id');
    }
}
