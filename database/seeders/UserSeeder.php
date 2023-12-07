<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => "Administrador",
            'email' => "admin@uaihome.br",
            'password' => Hash::make('12345678'),
            'cpf' => '150.287.086-06',
            'is_admin'=> '1',

        ]);
    }
}