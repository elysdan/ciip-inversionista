<?php

namespace Database\Seeders;

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
                'name' => 'CIIP',
                'email' => 'ciip2024@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$yk1.qUaZiGadhQI/Y/xkTe4XrOnplsxjuzaY0Rn5SBthQHElbs/Xm',
                'remember_token' => NULL,
                'created_at' => '2024-10-04 16:25:43',
                'updated_at' => '2024-10-04 16:25:43',
                'file' => 'images/usuario/fotos/ciip2024@gmail.com',
                'surname' => 'SUPER USUARIO',
                'role' => '9',
                'status' => '1',
            ),
        ));
        
        
    }
}