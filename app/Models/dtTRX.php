<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tindakan;

class dtTRX extends Model
{
    protected $table = 'tbl_detail_transaksi';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_trx', 'id_tindakan', 'qty', 'tgl_transaksi', 'created_at'
    ];

    public function get_td()
    {
        return $this->belongsTo(Tindakan::class, 'id_tindakan', 'id_tindakan');
    }
}
