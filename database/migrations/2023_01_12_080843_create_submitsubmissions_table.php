<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submitsubmissions', function (Blueprint $table) {
            $table->id();
            $table->text('file')->nullable();
            $table->text('description')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('mission_id');
            $table->foreignId('submission_id');
            $table->string('extension')->nullable();
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
        Schema::dropIfExists('submitsubmissions');
    }
};
