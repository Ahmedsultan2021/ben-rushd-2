<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alter2BranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->text("address");
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->json("worktimes");

       });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('branches', function (Blueprint $table) {
            $table->dropColumn("address");
            $table->dropColumn('latitude')->nullable();
            $table->dropColumn('longitude')->nullable();
            $table->dropColumn("worktimes");

        });
    }
}
