<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    protected $table = 'proyek';
 
    protected $primaryKey = 'id_proyek';

    protected $fillable = [
        'id_pelanggan',
        'nama_proyek',
        'jangka_waktu_awal',
        'jangka_waktu_akhir',
        'garansi',
    ];

    public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
	}

    public function keluhan()
	{
		return $this->hasMany(Keluhan::class, 'id_proyek');
	}
}
