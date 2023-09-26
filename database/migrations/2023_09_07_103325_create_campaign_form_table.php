<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_form', function (Blueprint $table) {
            $table->id();  // Optional primary key
            $table->unsignedBigInteger('campaign_id')->nullable();  // Allow null values
            $table->unsignedBigInteger('form_id')->nullable();  // Allow null values
            $table->timestamps();  // Optional timestamps
        
            // Foreign keys
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onDelete('set null');
            $table->foreign('form_id')->references('id')->on('forms')->onDelete('set null');
        
            // Optional unique constraint to prevent duplicate entries
            $table->unique(['campaign_id', 'form_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('campaign_form');
    }
}
