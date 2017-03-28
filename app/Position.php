<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';

    /*protected $primaryKey = ['id'];*/

    protected $fillable = ['name', 'description'];

    public function staff()
    {
        return $this->belongsToMany('App\Staff','position_has_staff');
    }
}
