<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tanggapan extends Model
{
    protected $table = 'tanggapan';
        
            protected $primaryKey = 'id_tanggapan';
        
            protected $fillable = [
                'id_keluhan',
                'tgl_tanggapan',
                'tanggapan',
                'id_petugas',
            ];
            
            public function keluhan()
            {
                return $this->belongsTo(Keluhan::class, 'id_keluhan');
            }

            public function petugas()
            {
                return $this->belongsTo(Petugas::class, 'id_petugas');
            }
}
