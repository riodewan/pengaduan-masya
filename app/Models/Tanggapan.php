<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    use HasFactory;

    protected $table = 'tanggapan';

    protected $fillable = [
        'pengaduan_id', 'tanggapan',
    ];

    public function pengaduan()
    {
    	return $this->hasOne(Laporan::class,'id', 'id');
    }

    public function proses()
    {
        return $this->hasMany(Laporan::class, 'status_id','status');
    }
}
