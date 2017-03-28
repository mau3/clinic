<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $primaryKey = 'id';

    protected $fillable = ['id','dateofPublish', 'title', 'description', 'picture', 'staff_user_id'];

    public function staff()
    {
        return $this->belongsTo('App\Staff','staff_user_id', 'user_id');
    }

}