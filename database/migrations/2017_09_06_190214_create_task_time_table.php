<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTaskTimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer( 'task_id' );
            $table->string( 'developer' )->references( 'id' )->on( 'users' );
            $table->string( 'description' );
            $table->unsignedDecimal( 'hours', 5, 2 );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_time');
    }
}
