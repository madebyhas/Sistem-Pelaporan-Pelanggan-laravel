<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;

    protected $table = 'keluhan';

    protected $primaryKey = 'id_keluhan';

    protected $fillable = [
        'id_pelanggan',
        'tgl_keluhan',
        'isi_keluhan',
        'foto',
        'status',
    ];

    protected $dates = ['tgl_keluhan'];

    public function user()
    {
        return $this->hasOne(Pelanggan::class, 'id_pelanggan', 'id_pelanggan'); 
    }

    public function pelanggan()
	{
		return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
	}

    public function penindakan()
	{
		return $this->hasOne(Penindakan::class, 'id_keluhan', 'id_keluhan');
	}  
}
