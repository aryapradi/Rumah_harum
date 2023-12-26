<?php

// app/Models/Sampah.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sampah extends Model
{
    use HasFactory;

    protected $table = 'sampah';

    protected $fillable = [
        'nama',
        'gambar',
        'jenis_sampah_id',
        'harga_nasabah',
        'harga_unit',
        'status_id',
        'satuan_id',
        'keterangan',
        // tambahkan atribut lain jika ada
    ];
    

    // app/Models/Sampah.php

public function jenisSampah()
{
    return $this->belongsTo(JenisSampah::class, 'jenis_sampah_id');
}

public function satuan()
{
    return $this->belongsTo(Satuan::class, 'satuan_id');
}

public function status()
{
    return $this->belongsTo(Status::class, 'status_id');
}

}


