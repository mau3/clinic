<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $table = 'staff';

    protected $primaryKey = 'user_id';

    protected $fillable = [ 'biography','photo','user_id'];

    public $incrementing = false;

    public function positions()
    {
        return $this-> belongsToMany('App\Position','position_has_staff', 'user_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
    public function receptions()
    {
        return $this->hasMany('App\Reception','staff_user_id','user_id');
    }
    public function services()
    {
        return $this->hasMany('App\News','staff_user_id','user_id');
    }
    public function news()
    {
        return $this->hasMany('App\News','staff_user_id','user_id');
    }

}

