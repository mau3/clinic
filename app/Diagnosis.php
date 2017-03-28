<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    protected $table = 'diagnoses';

    protected $primaryKey = 'id';

    protected $fillable = ['content','id','reception_id'];


    public function reception()
    {
        return $this->belongsTo('App\Reception','id', 'reception_id');
    }


}
