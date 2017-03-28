<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';

    protected $primaryKey = 'id';

    protected $fillable = ['id','name', 'description', 'cost','staff_user_id'];

    public function staff()
    {
        return $this->belongsTo('App\Staff', 'staff_user_id', 'user_id');
    }
}