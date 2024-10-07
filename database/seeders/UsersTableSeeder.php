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
                'updated_at' => '2024-10-07 15:28:27',
                'file' => 'images/usuario/fotos/ciip2024@gmail.com',
                'surname' => 'SUPER USUARIO',
                'role' => '9',
                'status' => '1',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'LAILA',
                'email' => 'lailacorreo@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$nPdXN3qBKBKhKGNBelsiKe2.mM.EkYF0JYO.qQiTljvbOxW/Mv8Bm',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:05:42',
                'updated_at' => '2024-10-07 15:48:03',
                'file' => 'images/usuario/fotos/lailacorreo@gmail.com',
                'surname' => 'TAJELDINE',
                'role' => '7',
                'status' => '1',
            ),
            2 => 
            array (
                'id' => 4,
                'name' => 'MARIA PIA',
                'email' => 'mariacorreo@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$NdEdZoAOfaD8K1hFt/8H/.PhfxGa1Nenru6s4CuoRVeO8SJx.JSqm',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:05:03',
                'updated_at' => '2024-10-07 15:48:14',
                'file' => 'images/usuario/fotos/mariacorreo@gmail.com',
                'surname' => 'SAVOIA',
                'role' => '5',
                'status' => '1',
            ),
            3 => 
            array (
                'id' => 3,
                'name' => 'GERMAN',
                'email' => 'germancorreo@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$G1BWGvItbIF4ogKVZ8uah.VEMfWHCwuUWotYzS/HdZ/Av9mzT/D9q',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:04:07',
                'updated_at' => '2024-10-07 15:48:25',
                'file' => 'images/usuario/fotos/germancorreo@gmail.com',
                'surname' => 'GERARDINO',
                'role' => '5',
                'status' => '1',
            ),
            4 => 
            array (
                'id' => 2,
                'name' => 'HEDWING',
                'email' => 'hedwingcorreo@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$A8LMwFLnz3RBDyfNA5m2C.zblwVtkSOXCC540wJczhnOaLvvC/u.W',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:03:06',
                'updated_at' => '2024-10-07 15:48:32',
                'file' => 'images/usuario/fotos/hedwingcorreo@gmail.com',
                'surname' => 'GUTIERREZ',
                'role' => '5',
                'status' => '1',
            ),
        ));
        
        
    }
}