<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComponentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('component_group')
        ->insert([
            'nama' => 'Setang',
            'deskripsi' => 'Setang sepeda'
        ]);
    }
}
