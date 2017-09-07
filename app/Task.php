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

    /*
    * The attributes that should be casted to native types
    *
    * @var array
    */
    protected $casts = [
        'developers' => 'array',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'task_name', 'client', 'developers', 'hours_worked', 'hours_to_build',
    ];

    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }

}
