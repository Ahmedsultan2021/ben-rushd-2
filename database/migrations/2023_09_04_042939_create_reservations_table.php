<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('customerName');
            $table->string('phone', 15);
            $table->string('email');
            $table->string("servey")->nullable();
            $table->foreignId('offer_id')->nullable()->constrained('offers')->onDelete('set null')->onUpdate('set null');
            $table->foreignId("branch_id")->constrained("branches")->onDelete("no action")->onUpdate("no action");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
