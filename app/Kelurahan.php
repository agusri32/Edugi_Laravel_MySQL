<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kelurahan extends Model
{
    use Notifiable;
    protected $table = 'indonesia_villages';
    protected $fillable = [
        'name',
        'district_id'
    ];
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}