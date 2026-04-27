<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $publisher = User::create([
            'name' => 'Penerbit Cuaca',
            'email' => 'publisher@cuaca.com',
            'password' => Hash::make('password123'),
            'role' => 'publisher',
        ]);

        $visitor = User::create([
            'name' => 'Pengunjung Biasa',
            'email' => 'visitor@cuaca.com',
            'password' => Hash::make('password123'),
            'role' => 'visitor',
        ]);

        $kategoriHujan = Category::create([
            'name' => 'Musim Hujan',
            'slug' => 'musim-hujan'
        ]);

        $kategoriCerah = Category::create([
            'name' => 'Cerah Berawan',
            'slug' => 'cerah-berawan'
        ]);

        Post::create([
            'user_id' => $publisher->id,
            'category_id' => $kategoriHujan->id,
            'title' => 'Prediksi Hujan Lebat di Jakarta',
            'slug' => Str::slug('Prediksi Hujan Lebat di Jakarta'),
            'content' => 'BMKG memperkirakan hujan lebat akan turun di wilayah Jakarta pada sore hari ini.',
        ]);

        Post::create([
            'user_id' => $publisher->id,
            'category_id' => $kategoriCerah->id,
            'title' => 'Akhir Pekan Cerah untuk Liburan',
            'slug' => Str::slug('Akhir Pekan Cerah untuk Liburan'),
            'content' => 'Cuaca diprediksi sangat cerah di akhir pekan ini, cocok untuk liburan bersama keluarga.',
        ]);
    }
}
