<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kecamatan extends Model
{
    use Notifiable;
    protected $table = 'indonesia_districts';
    protected $fillable = [
        'name',
        'city_id'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
