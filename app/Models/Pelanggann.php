<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\foundation\Auth\User as Authenticatable;

class Pelanggan extends Authenticatable
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $primaryKey = 'id_pelanggan';

    protected $fillable = [
        'id_proyek',
        'nama',
        'email',
        'telp',
        'username',
        'password',
    ];

    
    public function proyek()
	{
		return $this->belongsTo(Proyek::class, 'id_proyek');
	}
    
}
