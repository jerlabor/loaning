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
