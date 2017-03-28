<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{


    protected $table = 'receptions';

    protected $primaryKey = 'id';

    protected $fillable = [ 'id','date','time','someInformation','patients_user_id','staff_user_id'];

    public function staff()
    {
        return $this->belongsTo('App\Staff','staff_user_id','user_id');
    }
    public function patient()
    {
        return $this->belongsTo('App\Patient','patients_user_id','user_id');
    }
    public function recipe()
    {
        return $this->hasMany('App\Recipe','reception_id','id');
    }
    public function diagnoses()
    {
        return $this->hasMany('App\Diagnosis','reception_id','id');
    }
}

