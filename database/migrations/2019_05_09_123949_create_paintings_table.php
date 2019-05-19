<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaintingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paintings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('refference_id');
            $table->string('image')->nullable()->default(NULL);
            $table->string('author');
            $table->string('title');
            $table->text('description');
            $table->double('price', 15,2)->default(0);
            $table->integer('type');
            $table->date('sold_at')->nullable()->default(NULL);
            $table->timestamps();

            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paintings');
    }
}
