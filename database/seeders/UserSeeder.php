<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'JAdmin',
                'email' => 'admin@correo.es',
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Otro Usuario',
                'email' => 'otro_usuario@example.com',
                'password' => Hash::make('otra_password'),
                'remember_token' => Str::random(10),
            ],
            // Puedes agregar más usuarios si es necesario
        ]);
    }
}
