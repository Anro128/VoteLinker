<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'NIM' => 'X6401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'admin'
        ]);

        User::factory()->createMany([
            [
                'name' => 'Samsul',
                'NIM' => 'A1401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Manajemen Sumberdaya Lahan',
                'email' => 'a1@gmail.com',
                'password' => Hash::make('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Siti',
                'NIM' => 'A2401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Agronomi dan Hortikultura',
                'email' => 'a2@gmail.com',
                'password' => Hash::make('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Budi',
                'NIM' => 'A3401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Proteksi Tanaman',
                'email' => 'a3@gmail.com',
                'password' => Hash::make('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ani',
                'NIM' => 'A4401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Arsitektur Lanskap',
                'email' => 'a4@gmail.com',
                'password' => Hash::make('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Tono',
                'NIM' => 'A5401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Smart Agriculture',
                'email' => 'a5@gmail.com',
                'password' => Hash::make('bismillah'),
                'role' => 'voter',
            ]
        ]);

        User::factory()->create([
            'name' => 'coba b',
            'NIM' => 'B1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'b@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);

        User::factory()->create([
            'name' => 'coba c',
            'NIM' => 'C1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'c@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);

        User::factory()->create([
            'name' => 'coba d',
            'NIM' => 'D1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'd@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);

        User::factory()->create([
            'name' => 'coba e',
            'NIM' => 'E1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'e@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
        User::factory()->create([
            'name' => 'coba f',
            'NIM' => 'F1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'f@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
        User::factory()->create([
            'name' => 'coba g',
            'NIM' => 'G1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'g@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
        User::factory()->create([
            'name' => 'coba H',
            'NIM' => 'H1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'h@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
        User::factory()->create([
            'name' => 'coba I',
            'NIM' => 'I1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'i@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
        User::factory()->create([
            'name' => 'coba j',
            'NIM' => 'J1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'j@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
        User::factory()->create([
            'name' => 'coba k',
            'NIM' => 'K1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'k@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);



    }
}
