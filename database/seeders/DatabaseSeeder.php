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
            'NIM' => 'G6401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'admin'
        ]);

        User::factory()->create([
            'name' => 'coba a',
            'NIM' => 'A1401221999',
            'fakultas' => 'coba',
            'departemen' => 'coba',
            'email' => 'a@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
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
