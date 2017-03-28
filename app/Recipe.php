<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $primaryKey = 'id';

    protected $fillable = ['id','content', 'reception_id'];

    public function reception()
    {
        return $this->belongsTo('App\Reception','id', 'reception_id');
    }


}
