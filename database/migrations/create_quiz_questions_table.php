<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('quiz_questions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')
                    ->references('id')
                    ->on('quizzes')
                    ->onDelete('cascade');
            
            $table->string('name');
            $table->string('alt');
            $table->text('description');
            $table->text('image');

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
        Schema::dropIfExists('quiz_questions');
    }
};
