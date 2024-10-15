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
                'id' => 8,
                'name' => 'HECTOR',
                'email' => 'h.bravo@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$oELQMGZi0sqiVE7/6efM3.I75EIRC6EfbwIDX3sAvIDx3aaI31dE6',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:33:07',
                'updated_at' => '2024-10-15 16:33:20',
                'file' => 'images/usuario/fotos/h.bravo@ciip.com.ve',
                'surname' => 'BRAVO',
                'role' => '5',
                'status' => '1',
            ),
            1 => 
            array (
                'id' => 7,
                'name' => 'NATALY',
                'email' => 'n.gelves@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$CVmE90/oRrdz//ApWa6Xre27siq5BnAC/rR8uelgkaHqgPKtJvULC',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:31:44',
                'updated_at' => '2024-10-15 16:33:54',
                'file' => 'images/usuario/fotos/n.gelves@ciip.com.ve',
                'surname' => 'GELVES',
                'role' => '4',
                'status' => '1',
            ),
            2 => 
            array (
                'id' => 9,
                'name' => 'SAUDY',
                'email' => 's.contreras@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$83S7QNjacwByYsjp.kTk/.6J.xWIkz88glrmuiQWEurmYGEnebXb.',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:36:08',
                'updated_at' => '2024-10-15 16:36:08',
                'file' => 'images/usuario/fotos/s.contreras@ciip.com.ve',
                'surname' => 'CONTRERAS',
                'role' => '2',
                'status' => '1',
            ),
            3 => 
            array (
                'id' => 10,
                'name' => 'MARIA',
                'email' => 'm.hernandez@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$2ZlaXSmIV/WlxqyFqM9NH.h3C/6si9EYFv4ecao8Il8.tX4E6QJFy',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:37:14',
                'updated_at' => '2024-10-15 16:37:14',
                'file' => 'images/usuario/fotos/m.hernandez@ciip.com.ve',
                'surname' => 'HERNANDEZ',
                'role' => '4',
                'status' => '1',
            ),
            4 => 
            array (
                'id' => 11,
                'name' => 'ISOLIMAR',
                'email' => 'i.sanchez@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$fFkGhmW4HWJv/7u2SsmH9.GzYc.3cIOnCK2VGdcnilDjUpnZNKbOS',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:38:24',
                'updated_at' => '2024-10-15 16:38:24',
                'file' => 'images/usuario/fotos/i.sanchez@ciip.com.ve',
                'surname' => 'SANCHEZ',
                'role' => '5',
                'status' => '1',
            ),
            5 => 
            array (
                'id' => 12,
                'name' => 'YOLISKAR',
                'email' => 'y.diaz@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$JaVex7vKSlULIisrbYFdXudWJHN6gLKU4KLJwTSwbs4JqkKU7uEue',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:39:13',
                'updated_at' => '2024-10-15 16:39:13',
                'file' => 'images/usuario/fotos/y.diaz@ciip.com.ve',
                'surname' => 'DIAZ',
                'role' => '4',
                'status' => '1',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'SARAY',
                'email' => 's.verdu@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$mqdvckUQaBTQHCeM09RghOqGosYAceQhpfBmHDbL59xyAn3//w4ZO',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:40:44',
                'updated_at' => '2024-10-15 16:40:44',
                'file' => 'images/usuario/fotos/s.verdu@ciip.com.ve',
                'surname' => 'VERDU',
                'role' => '2',
                'status' => '1',
            ),
            7 => 
            array (
                'id' => 5,
                'name' => 'LAILA',
                'email' => 'l.tajeldine@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$kpyVO5XvegMWi3TOiCnIFee335AorpAH79r8TK2YlUz9OkdDd2hBq',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:05:42',
                'updated_at' => '2024-10-15 16:41:41',
                'file' => 'images/usuario/fotos/lailacorreo@gmail.com',
                'surname' => 'TAJELDINE',
                'role' => '7',
                'status' => '1',
            ),
            8 => 
            array (
                'id' => 2,
                'name' => 'HEDWING',
                'email' => 'h.gutierrez@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$D4Iu3ocmFn3QPOr2RGYXSOA.TVCYqh7Ibi.K7DqxqaOCZCTJIJUi.',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:03:06',
                'updated_at' => '2024-10-15 16:42:06',
                'file' => 'images/usuario/fotos/hedwingcorreo@gmail.com',
                'surname' => 'GUTIERREZ',
                'role' => '6',
                'status' => '1',
            ),
            9 => 
            array (
                'id' => 4,
                'name' => 'MARIA PIA',
                'email' => 'm.savoia@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$.o4/kK2rziz1ma9us44avOGFMxIBjkefflDIpUEy63YPyJMJ31eee',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:05:03',
                'updated_at' => '2024-10-15 16:42:28',
                'file' => 'images/usuario/fotos/mariacorreo@gmail.com',
                'surname' => 'SAVOIA',
                'role' => '6',
                'status' => '1',
            ),
            10 => 
            array (
                'id' => 3,
                'name' => 'GERMAN',
                'email' => 'g.gerardino@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$z/P4xmxwpl268617n2Qn5.CIRXxsExBXYnsfyvYSK4IqgZCtAEY4C',
                'remember_token' => NULL,
                'created_at' => '2024-10-07 15:04:07',
                'updated_at' => '2024-10-15 16:42:52',
                'file' => 'images/usuario/fotos/germancorreo@gmail.com',
                'surname' => 'GERARDINO',
                'role' => '5',
                'status' => '1',
            ),
            11 => 
            array (
                'id' => 14,
                'name' => 'ADMINISTRADOR',
                'email' => 'administradorciip@ciip.com.ve',
                'email_verified_at' => NULL,
                'password' => '$2y$12$j14WycJWa69xLlJEpGO.keoNjykqLwxe7YxXI4RApWpswiO9Zy2qG',
                'remember_token' => NULL,
                'created_at' => '2024-10-15 16:45:14',
                'updated_at' => '2024-10-15 16:47:54',
                'file' => 'images/usuario/fotos/administradorciip@ciip.com.ve',
                'surname' => 'CIIP',
                'role' => '8',
                'status' => '1',
            ),
            12 => 
            array (
                'id' => 1,
                'name' => 'SUPER USUARIO',
                'email' => 'ciip2024@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$cqR20iLHOKZGSOAly67o9eP1KdwjzlU4JQHE3Sy42Y5u3iDsUbUkO',
                'remember_token' => NULL,
                'created_at' => '2024-10-04 16:25:43',
                'updated_at' => '2024-10-15 16:48:15',
                'file' => 'images/usuario/fotos/ciip2024@gmail.com',
                'surname' => 'CIIP',
                'role' => '9',
                'status' => '1',
            ),
        ));
        
        
    }
}