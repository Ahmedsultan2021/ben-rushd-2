<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('mobile');
            $table->string('email')->unique();
            $table->enum('role', ['admin', 'suberAdmin'])->default('admin');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId("created_by")->nullable()->constrained("users")->onDelete("set null")->onUpdate("set null");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
