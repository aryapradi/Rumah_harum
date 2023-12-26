<?php

// app/Models/StatusSampah.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = 'status_sampah';

    protected $fillable = [
        'nama',
        // Add other fillable attributes here...
    ];

    public function sampah()
    {
        return $this->belongsToMany(Sampah::class, 'sampah', 'status_id', 'sampah_id')
            ->withPivot('jenis_sampah_id', 'satuan_id');
    }
}

