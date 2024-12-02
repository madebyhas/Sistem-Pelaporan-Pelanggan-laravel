<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penindakan extends Model
{
    use HasFactory;
        
            protected $table = 'penindakan';
        
            protected $primaryKey = 'id_penindakan';
        
            protected $fillable = [
                'id_keluhan',
                'tgl_penindakan',
                'penindakan',
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
