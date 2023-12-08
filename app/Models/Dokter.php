<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table = 'tbl_dokter';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_dokter', 'nama_dokter', 'created_at'
    ];
}
