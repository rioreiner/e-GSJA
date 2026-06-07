<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\JadwalIbadah;
use App\Models\Jemaat;
use App\Models\Keuangan;
use App\Models\Pelayanan;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DummySeeder extends Seeder
{
    public function run(): void
    {
        $adminUser = User::where('email', 'admin@gsja.com')->first();

        // ─── Jemaat Dummy ────────────────────────────────────────────────
        $namaList = [
            'Andi Susanto', 'Budi Santoso', 'Citra Dewi', 'David Kurniawan',
            'Eka Putri', 'Fajar Nugroho', 'Gita Rahma', 'Hendra Wijaya',
            'Indah Pertiwi', 'Joko Pramono', 'Kartika Sari', 'Lukas Maulana',
            'Maria Ningsih',
        ];

        $jenisKelamin    = ['Laki-laki', 'Perempuan'];
        $statusPernikahan = ['Belum Menikah', 'Menikah', 'Cerai', 'Janda', 'Duda'];
        $statusKeanggotaan = ['Aktif', 'Aktif', 'Aktif', 'Tidak Aktif', 'Pindah'];

        foreach ($namaList as $i => $nama) {
            $jk = $i % 2 === 0 ? 'Laki-laki' : 'Perempuan';
            Jemaat::create([
                'nomor_anggota'      => 'JMT-' . str_pad($i + 1, 5, '0', STR_PAD_LEFT),
                'nama_lengkap'       => $nama,
                'jenis_kelamin'      => $jk,
                'tanggal_lahir'      => now()->subYears(rand(18, 70))->subDays(rand(0, 365))->format('Y-m-d'),
                'alamat'             => 'Jl. ' . $this->randomJalan() . ' No. ' . rand(1, 100) . ', Makassar',
                'no_telepon'         => '08' . rand(10000000, 99999999),
                'email'              => Str::lower(str_replace(' ', '.', $nama)) . '@email.com',
                'status_pernikahan'  => $statusPernikahan[array_rand($statusPernikahan)],
                'status_keanggotaan' => $statusKeanggotaan[array_rand($statusKeanggotaan)],
            ]);
        }

        // ─── Jadwal Ibadah Dummy ──────────────────────────────────────────
        $jadwalData = [
            ['nama_kegiatan' => 'Ibadah Minggu Pagi', 'pendeta' => 'Pdt. Yohanes Simanjuntak', 'tema' => 'Kasih yang Sempurna'],
            ['nama_kegiatan' => 'Ibadah Pemuda', 'pendeta' => 'Pdt. Ruth Panggabean', 'tema' => 'Generasi yang Terpilih'],
            ['nama_kegiatan' => 'Ibadah Jumat Agung', 'pendeta' => 'Pdt. Yohanes Simanjuntak', 'tema' => 'Pengorbanan Yesus Kristus'],
            ['nama_kegiatan' => 'Ibadah Natal', 'pendeta' => 'Pdt. Maria Siahaan', 'tema' => 'Sang Juru Selamat Telah Lahir'],
        ];

        $jadwals = [];
        foreach ($jadwalData as $i => $data) {
            $tanggal = now()->addDays(rand(-30, 60));
            $jadwals[] = JadwalIbadah::create(array_merge($data, [
                'tanggal' => $tanggal->format('Y-m-d'),
                'waktu'   => ['08:00', '10:00', '17:00', '19:00'][rand(0, 3)],
                'lokasi'  => 'Gedung Gereja Utama, Jl. Pattimura No. 1, Makassar',
            ]));
        }

        // ─── Pelayanan Dummy ──────────────────────────────────────────────
        $jenisPelayanan = ['Singer', 'Musik', 'Multimedia', 'Usher'];
        $namaPelayan    = array_slice($namaList, 0, 15);

        foreach ($jadwals as $jadwal) {
            for ($j = 0; $j < rand(3, 8); $j++) {
                Pelayanan::create([
                    'jadwal_ibadah_id' => $jadwal->id,
                    'nama_pelayan'     => $namaPelayan[array_rand($namaPelayan)],
                    'jenis_pelayanan'  => $jenisPelayanan[array_rand($jenisPelayanan)],
                ]);
            }
        }

        // ─── Keuangan Dummy ───────────────────────────────────────────────
        $kategoriPemasukan   = ['Persembahan Minggu', 'Persembahan Khusus', 'Perpuluhan', 'Sumbangan Donatur', 'Pendapatan Lain'];
        $kategoriPengeluaran = ['Operasional', 'Gaji Pendeta', 'Listrik & Air', 'Renovasi', 'Sosial & Diakonia', 'ATK', 'Sound System'];

        for ($month = 1; $month <= 12; $month++) {
            // Pemasukan per bulan
            for ($k = 0; $k < rand(4, 8); $k++) {
                Keuangan::create([
                    'jenis'      => 'pemasukan',
                    'kategori'   => $kategoriPemasukan[array_rand($kategoriPemasukan)],
                    'jumlah'     => rand(500, 50000) * 1000,
                    'tanggal'    => now()->setMonth($month)->setDay(rand(1, 28))->format('Y-m-d'),
                    'keterangan' => 'Penerimaan ' . now()->setMonth($month)->translatedFormat('F Y'),
                    'user_id'    => $adminUser->id,
                ]);
            }

            // Pengeluaran per bulan
            for ($k = 0; $k < rand(3, 6); $k++) {
                Keuangan::create([
                    'jenis'      => 'pengeluaran',
                    'kategori'   => $kategoriPengeluaran[array_rand($kategoriPengeluaran)],
                    'jumlah'     => rand(100, 20000) * 1000,
                    'tanggal'    => now()->setMonth($month)->setDay(rand(1, 28))->format('Y-m-d'),
                    'keterangan' => 'Pengeluaran operasional ' . now()->setMonth($month)->translatedFormat('F Y'),
                    'user_id'    => $adminUser->id,
                ]);
            }
        }

        // ─── Posts/Berita Dummy ───────────────────────────────────────────
        $postData = [
            ['judul' => 'Pelayanan Sosial Gereja kepada Warga Kurang Mampu', 'author' => 'Pdt. Yohanes Simanjuntak'],
            ['judul' => 'Program Beasiswa Anak Jemaat Tahun 2024', 'author' => 'Admin Gereja'],
            ['judul' => 'Ibadah Syukur HUT Gereja ke-50 Tahun', 'author' => 'Panitia HUT'],
        ];

        foreach ($postData as $data) {
            Post::create(array_merge($data, [
                'slug'    => Str::slug($data['judul']),
                'isi'     => $this->loremIpsum(),
                'status'  => 'published',
                'user_id' => $adminUser->id,
            ]));
        }

        // ─── Events Dummy ─────────────────────────────────────────────────
        $eventData = [
            ['nama_event' => 'Retreat Keluarga Gereja 2024', 'lokasi' => 'Villa Malino, Gowa'],
            ['nama_event' => 'Seminar Keluarga Bahagia', 'lokasi' => 'Aula Gereja Utama'],
            ['nama_event' => 'Bakti Sosial Donor Darah', 'lokasi' => 'Halaman Gereja'],
        ];

        foreach ($eventData as $i => $data) {
            Event::create(array_merge($data, [
                'tanggal'    => now()->addDays(rand(-20, 90))->format('Y-m-d'),
                'deskripsi'  => 'Deskripsi event ' . $data['nama_event'] . '. Acara ini diselenggarakan sebagai wujud pelayanan gereja kepada jemaat dan masyarakat.',
                'user_id'    => $adminUser->id,
            ]));
        }

        $this->command->info('Dummy data seeded successfully!');
    }

    private function randomJalan(): string
    {
        $names = ['Veteran', 'Diponegoro', 'Imam Bonjol', 'Gunung Bawakaraeng', 'Perintis Kemerdekaan', 'Sultan Alauddin', 'AP Pettarani', 'Urip Sumoharjo'];
        return $names[array_rand($names)];
    }

    private function loremIpsum(): string
    {
        return '<p>Gereja merupakan komunitas umat percaya yang dipanggil untuk saling mengasihi dan melayani. Dalam setiap kegiatan yang diselenggarakan, gereja selalu berupaya memberikan yang terbaik untuk seluruh jemaat.</p>
        <p>Kegiatan ini merupakan bagian dari program tahunan gereja yang bertujuan untuk mempererat tali persaudaraan antara sesama jemaat. Dengan semangat kebersamaan dan kasih Kristus, seluruh program dirancang agar memberikan dampak positif bagi kehidupan spiritual maupun sosial anggota jemaat.</p>
        <p>Mari bersama-sama kita tingkatkan iman dan pelayanan kita kepada Tuhan dan sesama. Bersatu dalam kasih, bertumbuh dalam iman, dan berdampak bagi masyarakat sekitar.</p>';
    }
}