<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $guarded = [];

    public function device()
    {
        return $this->hasOne('App\Models\Devices', 'd_serial_no', 'd_serial_no');
    }
}
