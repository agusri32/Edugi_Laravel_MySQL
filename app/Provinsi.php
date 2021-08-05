<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Provinsi extends Model
{
    use Notifiable;
    protected $table = 'indonesia_provinces';
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
