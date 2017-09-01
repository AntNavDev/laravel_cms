<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /*
    * The table associated with the model
    *
    * @var string
    */
    protected $table = 'tasks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_name', 'client',
    ];

    public function tasks()
    {
        return $this->belongsTo( 'App\User' );
    }


}
