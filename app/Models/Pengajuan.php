<?php


namespace App\Models;

use App\Models\Unit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class pengajuan extends Model
{
    use HasFactory;
    
    protected $table = 'pengajuan';
    protected $fillable = ['nama'];


    public function units()
    {
        return $this->hasMany(Unit::class, 'id_pengajuan');
    }

}


