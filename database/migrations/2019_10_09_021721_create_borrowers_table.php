<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBorrowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->unsignedInteger('referrer_id');
            $table->char('gender',1);
            $table->string('street')->nullable();
            $table->string('contact_num')->nullable();
            $table->unsignedBigInteger('city')->nullable();
            $table->unsignedBigInteger('barangay')->nullable();
            $table->unsignedBigInteger('province')->nullable();
            $table->unsignedTinyInteger('civil_status')->nullable();
            $table->string('other_SOI')->nullable();
            $table->string('barangay_captain')->nullable();
            $table->timestamps();
            $table->foreign('city')->references('id')->on('cities')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('barangay')->references('id')->on('barangays')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('province')->references('id')->on('provinces')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('civil_status')->references('id')->on('civil_statuses')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
}
