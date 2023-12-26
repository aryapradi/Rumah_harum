<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;

    protected $table = 'satuan';

    protected $fillable = [
        'nama',
        // Add other fillable attributes here...
    ];

    public function sampah()
    {
        return $this->belongsToMany(Sampah::class, 'sampah', 'satuan_id', 'sampah_id')
            ->withPivot('jenis_sampah_id', 'status_id');
    }
}
