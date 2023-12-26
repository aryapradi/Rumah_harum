<?php


// app/Models/JenisSampah.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSampah extends Model
{
    use HasFactory;

    protected $table = 'jenis_sampah';

    protected $fillable = [
        'jenis',
        // Add other fillable attributes here...
    ];

    public function sampah()
    {
        return $this->belongsToMany(Sampah::class, 'sampah', 'jenis_sampah_id', 'sampah_id')
            ->withPivot('satuan_id', 'status_id');
    }
}
