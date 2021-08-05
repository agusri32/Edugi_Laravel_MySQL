<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kabupaten extends Model
{
    use Notifiable;
    protected $table = 'tbl_kabupaten';
    protected $fillable = [
        'kab_nama',
        'kab_prov'
    ];
    protected $primaryKey = 'kab_kode';
    public $incrementing = false;
    protected $keyType = 'string';
}
