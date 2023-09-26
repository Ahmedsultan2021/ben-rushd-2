<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFieldResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('field_responses', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->foreignId('form_response_id')->nullable()->constrained('form_responses')->onDelete('set null'); // Foreign Key linking to form_responses
            $table->foreignId('form_field_id')->nullable()->constrained('form_fields')->onDelete('set null'); // Foreign Key linking to form_fields
            $table->text('value')->nullable(); // The user's answer; can be text or a serialized version for multiple selections
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field_responses');
    }
}
