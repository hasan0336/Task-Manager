<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
      protected $fillable = [
        'task_name', 'task_description','user_id','login_user_id'
    ];

}
