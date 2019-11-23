<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateViewPensions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
        CREATE OR REPLACE VIEW v_pensions AS
SELECT p.*,pt.pension_type,b.bank,bt.bank_type,brgyDesc,payday,agency,pension FROM pensions p
JOIN pension_types pt ON p.pension_type = pt.id
JOIN banks b ON p.pension_bank = b.id
JOIN barangays brgy ON p.bank_branch = brgy.id
JOIN bank_types bt on p.bank_type = bt.id
JOIN pension_agencies pa on p.pension_agency = pa.id
;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW v_pensions");
    }
}
