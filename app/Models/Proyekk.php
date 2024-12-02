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
        'nama_proyek',
        'nama_instansi',
        'alamat_instansi',
        'id_pelanggan',
        'jangka_waktu',
        'garansi',
    ];

    public function pelanggan()
	{
		return $this->hasMany(Pelanggan::class, 'id_proyek');
	}

    public function keluhan()
	{
		return $this->hasMany(Keluhan::class, 'id_proyek');
	}
}
