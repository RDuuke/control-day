<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlDayTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('control_day', function (Blueprint $table) {
            $table->id();
            $table->foreignId('promoter_id');
            $table->enum('type', ['start', 'end']);
            $table->string('date', 250);
            $table->string('hour', 250);
            $table->text('description');
            $table->text('evidence');
            $table->enum('deleted', ['0', '1'])->default('0');
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
        Schema::dropIfExists('control_day');
    }
}
