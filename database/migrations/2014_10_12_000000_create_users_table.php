<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username');
            $table->string('first_name')->nullable()->default(NULL);
            $table->string('last_name')->nullable()->default(NULL);
            $table->string('email');
            $table->integer('country_id')->nullable()->default(NULL);
            $table->string('street')->nullable()->default(NULL);
            $table->string('postal_code')->nullable()->default(NULL);
            $table->string('city')->nullable()->default(NULL);
            $table->string('phone_number')->nullable()->default(NULL);
            $table->timestamp('deleted_at')->nullable()->default(NULL);

            $table->integer('role_id')->default(2);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->engine = 'InnoDB';
            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
