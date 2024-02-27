<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'slug' => 'Worker',
        ]);
        Position::create([
            'slug' => 'Client',
        ]);
        Position::create([
            'slug' => 'Guest',
        ]);
        Position::create([
            'slug' => 'Alytus',
        ]);
        Position::create([
            'slug' => 'Vilnius',
        ]);
        Position::create([
            'slug' => 'Kaunas',
        ]);
        Position::create([
            'slug' => 'Klaipeda',
        ]);
        Position::create([
            'slug' => 'Siauliai',
        ]);
    }
}
