<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'tbl_pasien';
    public $primaryKey = 'id';

    protected $fillable = [
        'id_pasien', 'nama', 'alamat', 'no_hp', 'created_at'
    ];
}
