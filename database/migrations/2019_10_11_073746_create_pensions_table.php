<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePensionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pensions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('borrower_id');
            $table->unsignedBigInteger('added_by');
            $table->unsignedTinyInteger('pension_type');
            $table->unsignedBigInteger('pension_bank');
            $table->unsignedBigInteger('bank_branch');
            $table->unsignedTinyInteger('bank_type');
            $table->unsignedTinyInteger('pension_agency');
            $table->char('payday',2);
            $table->integer('pension');
            $table->timestamps();
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pension_type')->references('id')->on('pension_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pension_bank')->references('id')->on('banks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bank_type')->references('id')->on('bank_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pension_agency')->references('id')->on('pension_agencies')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pensions');
    }
}
