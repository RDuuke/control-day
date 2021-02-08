<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ControlDay extends Model
{
    protected $table = 'control_day';

    protected $fillable = ['promoter_id', 'type', 'date', 'hour','description', 'evidence'];

    public function getTypeAttribute($value)
    {
       $type = ['start' => 'inicio', 'end' => 'cierre'];
       return Str::ucfirst($type[$value]);
    }
}
