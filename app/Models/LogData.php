<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogData extends Model
{
    protected $table = 'log_data';
    public $primaryKey = 'id';

    protected $fillable = [
        'user', 'keterangan'
    ];
}