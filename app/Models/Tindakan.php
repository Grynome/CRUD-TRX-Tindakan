<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'tbl_tindakan';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_tindakan', 'nama_tindakan', 'harga', 'created_at'
    ];
}
