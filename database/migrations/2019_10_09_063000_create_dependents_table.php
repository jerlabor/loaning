<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDependentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dependents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedTinyInteger('relation');
            $table->unsignedBigInteger('borrower_id');
            $table->date('birthday');
            $table->timestamps();
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('relation')->references('id')->on('dependent_relations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dependents');
    }
}
