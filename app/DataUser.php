<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DataUser extends Model
{
    use Notifiable;

	protected $table = 'users';
}
