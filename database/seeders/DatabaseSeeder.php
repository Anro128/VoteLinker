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
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Siti',
                'NIM' => 'A2401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Agronomi dan Hortikultura',
                'email' => 'a2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Budi',
                'NIM' => 'A3401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Proteksi Tanaman',
                'email' => 'a3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ani',
                'NIM' => 'A4401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Arsitektur Lanskap',
                'email' => 'a4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Tono',
                'NIM' => 'A5401221999',
                'fakultas' => 'Pertanian',
                'departemen' => 'Smart Agriculture',
                'email' => 'a5@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ]
        ]);

        User::factory()->createMany([
            [
                'name' => 'Agus',
                'NIM' => 'B1401221999',
                'fakultas' => 'Kedokteran Hewan',
                'departemen' => 'Kedokteran Hewan',
                'email' => 'b1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Citra',
                'NIM' => 'B2401221999',
                'fakultas' => 'Kedokteran Hewan',
                'departemen' => 'Sains Biomedis',
                'email' => 'b3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Andi',
                'NIM' => 'C1401221999',
                'fakultas' => 'Perikanan dan Ilmu Kelautan',
                'departemen' => 'Teknologi dan Manajemen Perikanan Budidaya',
                'email' => 'c1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Budi',
                'NIM' => 'C2401221999',
                'fakultas' => 'Perikanan dan Ilmu Kelautan',
                'departemen' => 'Manajemen Sumberdaya Perairan',
                'email' => 'c2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Citra',
                'NIM' => 'C3401221999',
                'fakultas' => 'Perikanan dan Ilmu Kelautan',
                'departemen' => 'Teknologi Hasil Perairan',
                'email' => 'c3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Dewi',
                'NIM' => 'C4401221999',
                'fakultas' => 'Perikanan dan Ilmu Kelautan',
                'departemen' => 'Teknologi dan Manajemen Perikanan Tangkap',
                'email' => 'c4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Eka',
                'NIM' => 'C5401221999',
                'fakultas' => 'Perikanan dan Ilmu Kelautan',
                'departemen' => 'Ilmu dan Teknologi Kelautan',
                'email' => 'c5@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Fajar',
                'NIM' => 'D1401221999',
                'fakultas' => 'Peternakan',
                'departemen' => 'Teknologi Produksi Ternak',
                'email' => 'd1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Gita',
                'NIM' => 'D2401221999',
                'fakultas' => 'Peternakan',
                'departemen' => 'Nutrisi dan Teknologi Pakan',
                'email' => 'd2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Hadi',
                'NIM' => 'D3401221999',
                'fakultas' => 'Peternakan',
                'departemen' => 'Teknologi Hasil Ternak',
                'email' => 'd3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Agus',
                'NIM' => 'E1401221999',
                'fakultas' => 'Kehutanan dan Lingkungan',
                'departemen' => 'Manajemen Hutan',
                'email' => 'e1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Budi',
                'NIM' => 'E2401221999',
                'fakultas' => 'Kehutanan dan Lingkungan',
                'departemen' => 'Hasil Hutan',
                'email' => 'e2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Citra',
                'NIM' => 'E3401221999',
                'fakultas' => 'Kehutanan dan Lingkungan',
                'departemen' => 'Konservasi Sumberdaya Hutan dan Ekowisata',
                'email' => 'e3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Dewi',
                'NIM' => 'E4401221999',
                'fakultas' => 'Kehutanan dan Lingkungan',
                'departemen' => 'Silvikultur',
                'email' => 'e4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Agung Nugroho',
                'NIM' => 'F1401221999',
                'fakultas' => 'Teknologi Pertanian',
                'departemen' => 'Teknik Pertanian dan Biosistem',
                'email' => 'f1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Bagus Prasetyo',
                'NIM' => 'F2401221999',
                'fakultas' => 'Teknologi Pertanian',
                'departemen' => 'Teknologi Pangan',
                'email' => 'f2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Cahya Permana',
                'NIM' => 'F3401221999',
                'fakultas' => 'Teknologi Pertanian',
                'departemen' => 'Teknik Industri Pertanian',
                'email' => 'f3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Dian Kusuma Wardani',
                'NIM' => 'F4401221999',
                'fakultas' => 'Teknologi Pertanian',
                'departemen' => 'Teknik Sipil dan Lingkungan',
                'email' => 'f4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Galih',
                'NIM' => 'G1401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Statistika',
                'email' => 'g1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Gita',
                'NIM' => 'G2401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Meteorologi Terapan',
                'email' => 'g2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Guntur',
                'NIM' => 'G3401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Biologi',
                'email' => 'g3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Galang',
                'NIM' => 'G4401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Kimia',
                'email' => 'g4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ghani',
                'NIM' => 'G5401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Matematika',
                'email' => 'g5@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ganesh',
                'NIM' => 'G6401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Ilmu Komputer',
                'email' => 'g6@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ganda',
                'NIM' => 'G7401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Fisika',
                'email' => 'g7@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Gita',
                'NIM' => 'G8401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Biokimia',
                'email' => 'g8@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ganjar',
                'NIM' => 'G9401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Aktuaria',
                'email' => 'g9@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Gadis',
                'NIM' => 'G10401221999',
                'fakultas' => 'Matematika dan Pengetahuan Alam',
                'departemen' => 'Bioinformatika',
                'email' => 'g10@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        User::factory()->createMany([
            [
                'name' => 'Hadi',
                'NIM' => 'H1401221999',
                'fakultas' => 'Ekonomi dan Manajemen',
                'departemen' => 'Ekonomi Pembangunan',
                'email' => 'h1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Hana',
                'NIM' => 'H2401221999',
                'fakultas' => 'Ekonomi dan Manajemen',
                'departemen' => 'Manajemen',
                'email' => 'h2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Hadiyah',
                'NIM' => 'H3401221999',
                'fakultas' => 'Ekonomi dan Manajemen',
                'departemen' => 'Agribisnis',
                'email' => 'h3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Haris',
                'NIM' => 'H4401221999',
                'fakultas' => 'Ekonomi dan Manajemen',
                'departemen' => 'Ekonomi Sumberdaya dan Lingkungan',
                'email' => 'h4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Husna',
                'NIM' => 'H5401221999',
                'fakultas' => 'Ekonomi dan Manajemen',
                'departemen' => 'Ekonomi Syariah',
                'email' => 'h5@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);
        
        User::factory()->createMany([
            [
                'name' => 'Ika',
                'NIM' => 'I1401221999',
                'fakultas' => 'Ekologi Manusia',
                'departemen' => 'Ilmu Gizi',
                'email' => 'i1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Indah',
                'NIM' => 'I2401221999',
                'fakultas' => 'Ekologi Manusia',
                'departemen' => 'Ilmu Keluarga dan Konsumen',
                'email' => 'i2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Ivan',
                'NIM' => 'I3401221999',
                'fakultas' => 'Ekologi Manusia',
                'departemen' => 'Komunikasi dan Pengembangan Masyarakat',
                'email' => 'i3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);

        
        User::factory()->createMany([
            [
                'name' => 'Joko',
                'NIM' => 'J1401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Ekowisata (JB41 - EKW)',
                'email' => 'j1@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Joni',
                'NIM' => 'J2401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknologi Rekayasa Perangkat Lunak (JC41 - TPL)',
                'email' => 'j2@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jaya',
                'NIM' => 'J3401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknologi Rekayasa Komputer (JD41 - TEK)',
                'email' => 'j3@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jasmine',
                'NIM' => 'J4401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Supervisor Jaminan Mutu Pangan (JE41 - JMP)',
                'email' => 'j4@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Joko',
                'NIM' => 'J5401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Manajemen Industri Jasa Makanan dan Gizi (JF41 - GZI)',
                'email' => 'j5@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jodi',
                'NIM' => 'J6401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknologi dan Manajemen Pembenihan Ikan (JH41 - IKN)',
                'email' => 'j6@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jefri',
                'NIM' => 'J7401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknologi dan Manajemen Ternak (JI41 - TNK)',
                'email' => 'j7@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jessica',
                'NIM' => 'J8401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Manajemen Agribisnis (JJ41 - MAB)',
                'email' => 'j8@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Juna',
                'NIM' => 'J9401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Manajemen Industri (JK41 - MNI)',
                'email' => 'j9@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Julia',
                'NIM' => 'J10401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Analisis Kimia (JL41 - KIM)',
                'email' => 'j10@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jamil',
                'NIM' => 'J11401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknik dan Manajemen Lingkungan (JM41 - LNK)',
                'email' => 'j11@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jihan',
                'NIM' => 'J12401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Akuntansi (JN41 - AKN)',
                'email' => 'j12@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Joko',
                'NIM' => 'J13401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Paramedik Veteriner (JP41-PVT)',
                'email' => 'j13@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jodi',
                'NIM' => 'J14401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknologi Produksi dan Manajemen Perkebunan (JT41-TMP)',
                'email' => 'j14@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
            [
                'name' => 'Jeni',
                'NIM' => 'J15401221999',
                'fakultas' => 'Vokasi',
                'departemen' => 'Teknologi Produksi dan Pengembangan Masyarakat Pertanian (JW41-PPP)',
                'email' => 'j15@gmail.com',
                'password' => bcrypt('bismillah'),
                'role' => 'voter',
            ],
        ]);


        User::factory()->create([
            'name' => 'Kodir',
            'NIM' => 'K1401221999',
            'fakultas' => 'Bisnis',
            'departemen' => 'Bisnis',
            'email' => 'k1@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);

        User::factory()->create([
            'name' => 'Wasjum',
            'NIM' => 'L1401221999',
            'fakultas' => 'Kedokteran',
            'departemen' => 'Kedokteran',
            'email' => 'l1@gmail.com',
            'password' => bcrypt('bismillah'),
            'role'=>'voter'
        ]);
    }
}
