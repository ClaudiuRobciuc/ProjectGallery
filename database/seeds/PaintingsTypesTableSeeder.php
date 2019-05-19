<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PaintingsTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('painting_types')->insert([
            'slug' => 'Portrait',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('painting_types')->insert([
            'slug' => 'Landscape',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('painting_types')->insert([
            'slug' => 'Nature',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('painting_types')->insert([
            'slug' => 'Abstract',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
