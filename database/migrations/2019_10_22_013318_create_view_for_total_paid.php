<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewForTotalPaid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement(
            "CREATE VIEW v_repayment_summary AS
                SELECT 
                    loan_id,
                    SUM(amount) AS total_paid,
                    MAX(created_at) AS last_payment
                FROM
                    repayments
                GROUP BY loan_id;"
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW v_repayment_summary');
    }
}
