<?php

use Illuminate\Database\Seeder;

class ReferralsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Referral::class,5)->create();
    }
}
