<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kabupaten extends Model
{
    use Notifiable;
    protected $table = 'indonesia_cities';
    protected $fillable = [
        'name',
        'province_id'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
