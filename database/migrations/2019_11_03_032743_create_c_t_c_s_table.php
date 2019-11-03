<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTCSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ctc_num' );
            $table->date('ctc_date_issued' );
            $table->unsignedBigInteger('ctc_city_issued' );
            $table->unsignedBigInteger('borrower_id' );
            $table->foreign('ctc_city_issued')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('borrower_id')->references('id')->on('borrowers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('ctc');
    }
}
