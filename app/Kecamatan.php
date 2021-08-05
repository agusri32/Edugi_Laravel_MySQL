<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kecamatan extends Model
{
    use Notifiable;
    protected $table = 'tbl_kecamatan';
    protected $fillable = [
        'kec_nama',
        'kec_kab'
    ];
    protected $primaryKey = 'kec_kode';
    public $incrementing = false;
    protected $keyType = 'string';
}
