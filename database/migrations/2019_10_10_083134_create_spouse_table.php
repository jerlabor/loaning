<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpouseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spouse', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('date_married');
            $table->unsignedBigInteger('POM');
            $table->string('COD')->nullable();
            $table->date('date_died')->nullable();
            $table->unsignedBigInteger('borrower_id');
            $table->timestamps();
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spouse');
    }
}
