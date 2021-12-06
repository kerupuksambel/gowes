<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('components')
        ->insert([
            [
                'group_id' => 1,
                'nama' => 'Stang #1',
                'gambar' => 'https://via.placeholder.com/300.png/09f/fff',
                'deskripsi' => 'Setang buatan Jerman',
                'harga' => 250000,
                'stok' => 3
            ],[
                'group_id' => 1,
                'nama' => 'Stang #2',
                'gambar' => 'https://via.placeholder.com/300.png/aaa/fff',
                'deskripsi' => 'Setang buatan Italia',
                'harga' => 200000,
                'stok' => 4
            ]
        ]);
    }
}
