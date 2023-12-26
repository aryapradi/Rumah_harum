<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'unit';
    
    // Contoh menggunakan $fillable
    protected $fillable = [
        'nama_unit', 
        'gambar', 
        'tanggal', 
        'sk_unit', 
        'sk_terbit', 
        'nomor_sk', 
        'id_jadwal', 
        'nomor_handphone', 
        'nomor_telepon', 
        'email', 
        'provinsi', 
        'kabupaten', 
        'kecamatan', 
        'kelurahan', 
        'kodepos', 
        'alamat_lengkap'
    ];


    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'provinsi');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'kabupaten');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kecamatan');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'kelurahan');
    }
}