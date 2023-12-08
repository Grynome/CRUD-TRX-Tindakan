<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\dtTRX;

class TRX extends Model
{
    protected $table = 'tbl_transaksi';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_trx', 'id_pasien', 'id_dokter', 'tgl_transaksi', 'created_at'
    ];

    public function get_ps(){
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }
    public function get_dr(){
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }
    public function details()
    {
        return $this->hasMany(dtTRX::class, 'id_trx', 'id_trx');
    }
}
