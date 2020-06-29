<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('currencies')
            ->delete();

        \DB::table('currencies')->insert([
            [
                'id' => 1,
                'name' => 'usd',
            ],
            [
                'id' => 2,
                'name' => 'eur',
            ],
        ]);
    }
}
