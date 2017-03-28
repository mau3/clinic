<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patients';

    protected $primaryKey = 'user_id';

    protected $fillable = ['ssn', 'user_id'];


    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }

    public function receptions()
    {
        return $this->hasMany('App\Reception','patients_user_id','user_id');
    }
}