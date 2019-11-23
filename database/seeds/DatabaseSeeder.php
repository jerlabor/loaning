<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dependent_relations')->insert([
           ['name' => 'Son'],
           ['name' => 'Daughter'],
        ]);

        DB::table('civil_statuses')->insert([
            ['name' => 'Single'],
            ['name' => 'Married'],
            ['name' => 'Widow'],
            ['name' => 'Widower'],
        ]);

        DB::table('loan_types')->insert([
            ['loan_type' => 'New'],
            ['loan_type' => 'Renewal'],
            ['loan_type' => 'Addition'],
            ['loan_type' => 'Reactive'],
            ['loan_type' => 'Advance Bonus'],
            ['loan_type' => 'Salary'],
        ]);


        DB::table('banks')->insert([
            ['bank' => 'BPI'],
            ['bank' => 'Metrobank']
        ]);

        DB::table('bank_types')->insert([
            ['bank_type' => 'Passbook'],
            ['bank_type' => 'ATM']
        ]);

        DB::table('loan_statuses')->insert([
            ['loan_status' => 'Current'],
            ['loan_status' => 'Fully Paid']
        ]);

        DB::table('pension_agencies')->insert([
            ['agency' => 'GSIS'],
            ['agency' => 'SSS']
        ]);

        DB::table('pension_types')->insert([
            ['pension_type' => 'SD'],
            ['pension_type' => 'RT']
        ]);

        DB::unprepared("
        INSERT INTO `provinces` VALUES ('1', '012800000', 'ILOCOS NORTE', '01', '0128');
        INSERT INTO `provinces` VALUES ('2', '012900000', 'ILOCOS SUR', '01', '0129');
        INSERT INTO `provinces` VALUES ('3', '013300000', 'LA UNION', '01', '0133');
        INSERT INTO `provinces` VALUES ('4', '015500000', 'PANGASINAN', '01', '0155');
        INSERT INTO `provinces` VALUES ('5', '020900000', 'BATANES', '02', '0209');
        INSERT INTO `provinces` VALUES ('6', '021500000', 'CAGAYAN', '02', '0215');
        INSERT INTO `provinces` VALUES ('7', '023100000', 'ISABELA', '02', '0231');
        INSERT INTO `provinces` VALUES ('8', '025000000', 'NUEVA VIZCAYA', '02', '0250');
        INSERT INTO `provinces` VALUES ('9', '025700000', 'QUIRINO', '02', '0257');
        INSERT INTO `provinces` VALUES ('10', '030800000', 'BATAAN', '03', '0308');
        
        INSERT INTO `cities` VALUES ('1', '012801000', 'ADAMS', '01', '0128', '012801');
        INSERT INTO `cities` VALUES ('2', '012802000', 'BACARRA', '01', '0128', '012802');
        INSERT INTO `cities` VALUES ('3', '012803000', 'BADOC', '01', '0128', '012803');
        INSERT INTO `cities` VALUES ('4', '012804000', 'BANGUI', '01', '0128', '012804');
        INSERT INTO `cities` VALUES ('5', '012805000', 'CITY OF BATAC', '01', '0128', '012805');
        INSERT INTO `cities` VALUES ('6', '012806000', 'BURGOS', '01', '0128', '012806');
        INSERT INTO `cities` VALUES ('7', '012807000', 'CARASI', '01', '0128', '012807');
        INSERT INTO `cities` VALUES ('8', '012808000', 'CURRIMAO', '01', '0128', '012808');
        INSERT INTO `cities` VALUES ('9', '012809000', 'DINGRAS', '01', '0128', '012809');
        INSERT INTO `cities` VALUES ('10', '012810000', 'DUMALNEG', '01', '0128', '012810');
        
        
        INSERT INTO `barangays` VALUES ('1', '012801001', 'Adams (Pob.)', '01', '0128', '012801');
        INSERT INTO `barangays` VALUES ('2', '012802001', 'Bani', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('3', '012802002', 'Buyon', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('4', '012802003', 'Cabaruan', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('5', '012802004', 'Cabulalaan', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('6', '012802005', 'Cabusligan', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('7', '012802006', 'Cadaratan', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('8', '012802007', 'Calioet-Libong', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('9', '012802008', 'Casilian', '01', '0128', '012802');
        INSERT INTO `barangays` VALUES ('10', '012802009', 'Corocor', '01', '0128', '012802');
        ");

         $this->call(ReferralsTableSeeder::class);
    }
}
