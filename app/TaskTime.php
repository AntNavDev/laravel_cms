<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskTime extends Model
{
    /*
    * The table associated with the model
    *
    * @var string
    */
    protected $table = 'task_time';

    protected $fillable = [
        'task_id', 'developer', 'description', 'hours'
    ];

    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }

    public function task()
    {
        return $this->belongsTo( 'App\Task' );
    }

}
