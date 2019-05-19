<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ShippingStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('shipping_status')->insert([
            'status' => 'IN_PROCCESS',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('shipping_status')->insert([
            'status' => 'SHIPPED',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('shipping_status')->insert([
            'status' => 'DELIVERED',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
