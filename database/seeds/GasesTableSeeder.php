<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GasesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gases')->insert([

          [
            'name' => 'Mira Gas',
            'price' => 15,
          ],

          [
            'name' => 'Petronas',
            'price' => 25,
          ],

          [
            'name' => 'Petron',
            'price' => 10,
          ],

          [
            'name' => 'BHP',
            'price' => 20,
          ],

          [
            'name' => 'Solar Gas',
            'price' => 15,
          ],

          [
            'name' => 'My Gaz',
            'price' => 5,
          ],

        ]);
    }
}
