<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kelurahan extends Model
{
    use Notifiable;
    protected $table = 'tbl_desa';
    protected $fillable = [
        'desa_nama',
        'desa_kec'
    ];
    protected $primaryKey = 'desa_kode';
    public $incrementing = false;
    protected $keyType = 'string';
}