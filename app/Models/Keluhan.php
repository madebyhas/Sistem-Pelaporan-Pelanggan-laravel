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
        'id_proyek',
        'tgl_keluhan',
        'isi_keluhan',
        'foto',
        'status',
    ];

    protected $dates = ['tgl_keluhan'];

    public function user()
    {
        return $this->hasOne(Proyek::class, 'id_proyek', 'id_proyek'); 
    }

    public function proyek()
	{
		return $this->belongsTo(Proyek::class, 'id_proyek', 'id_proyek');
	}

    public function penindakan()
	{
		return $this->hasOne(Penindakan::class, 'id_keluhan', 'id_keluhan');
	}  
}
