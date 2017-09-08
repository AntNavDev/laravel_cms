<?php

namespace App;

use Validator;
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
        'task_name', 'client', 'developers', 'hours_to_build',
    ];

    public function user()
    {
        return $this->belongsTo( 'App\User' );
    }

    public function tasktime()
    {
        return $this->hasMany( 'App\TaskTime' );
    }

    public static function validateTask( $request )
    {
        $validator = Validator::make( $request->all(), [
            'task_name' => 'required',
            'client' => 'required',
            'developers' => 'required',
            'hours_to_build' => 'required|numeric|min:0.25'
        ] );

        return $validator;
    }

}
