<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    protected $primaryKey = 'id_petugas';

    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'telp',
        'level',
    ];

    public function Tanggapan()
	{
		return $this->hasMany(Tanggapan::class, 'id_petugas', 'id_petugas');
	}
}
