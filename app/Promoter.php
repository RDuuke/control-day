<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    protected $table = 'promoters';

    protected $fillable = ['name', 'last_name', 'document', 'deleted'];

    public function controls_day()
    {
       return $this->hasMany(ControlDay::class, 'promoter_id', 'id');
    }

    public function getFullNameAttribute()
    {
       return $this->name . ' ' . $this->last_name;
    }
}
