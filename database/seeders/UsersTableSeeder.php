<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Gerardo A Belot',
                'email' => 'gbelot2003@hotmail.com',
                'email_verified_at' => '2021-09-12 00:11:29',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'bbJWyoraIt',
                'status' => 1,
                'created_at' => '2021-09-12 00:11:29',
                'updated_at' => '2021-09-12 00:11:29',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Harold Rivera',
                'email' => 'conect@hotmail.com',
                'email_verified_at' => '2021-09-12 00:11:29',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => 'jRRhXY7rfJ',
                'status' => 1,
                'created_at' => '2021-09-12 00:11:30',
                'updated_at' => '2021-09-12 00:11:30',
            )
        ));
    }
}
