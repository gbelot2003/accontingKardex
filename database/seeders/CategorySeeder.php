<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();

        DB::table('categories')->insert(array 
            (
                0 => 
                    array (
                        'id' => 1,
                        'name' => 'Activos',
                        'description' => ''
                    ),
                1 => 
                    array (
                        'id' => 2,
                        'name' => 'Pasivos',
                        'description' => ''
                    ),
                2 => 
                    array (
                        'id' => 3,
                        'name' => 'Capital',
                        'description' => ''
                    ),
            ),
        );
    }
}
