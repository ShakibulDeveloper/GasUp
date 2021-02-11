<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MostPurchaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('most_purchases')->insert([

          [
            'product_name' => 'Mira Gas',
            'quantity' =>  0,
            'time' =>  '12:00 AM',
          ],
          [
            'product_name' => 'Petronas',
            'quantity' =>  0,
            'time' =>  '12:00 AM',
          ],
          [
            'product_name' => 'Petron',
            'quantity' =>  0,
            'time' =>  '12:00 AM',
          ],
          [
            'product_name' => 'BHP',
            'quantity' =>  0,
            'time' =>  '12:00 AM',
          ],
          [
            'product_name' => 'Solar Gas',
            'quantity' =>  0,
            'time' =>  '12:00 AM',
          ],
          [
            'product_name' => 'My Gaz',
            'quantity' =>  0,
            'time' =>  '12:00 AM',
          ],

        ]);
    }
}
