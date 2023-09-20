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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string("photo")->nullable();
            $table->enum('role', ['admin', 'worker', 'user'])->default('user'); // Enum column for roles
            $table->string('work')->nullable();
            $table->string('job')->nullable();
            $table->string('city')->nullable();
            $table->string('location')->nullable();
            $table->integer('rating')->default(1);
            $table->string('address')->nullable();
            $table->string('group_name')->nullable();
            $table->longText('bio')->nullable();
            $table->string('lifetime')->nullable();
            $table->integer('count')->default(1);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
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
