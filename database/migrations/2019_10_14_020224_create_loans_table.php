<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pension_code');
            $table->unsignedTinyInteger('loan_type');
            $table->unsignedTinyInteger('loan_status');
            $table->unsignedBigInteger('added_by');
            $table->decimal('principal_amount',13,2);
            $table->char('term',2);
            $table->date('release_date');
            $table->timestamps();
            $table->foreign('pension_code')->references('id')->on('pensions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('loan_type')->references('id')->on('loan_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('loan_status')->references('id')->on('loan_statuses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('added_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
