<?php

namespace Database\Seeders;

use App\Models\Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Date::create([
            'slug' => 'Newyear',
            'date' => '2024-01-01',
        ]);
        Date::create([
            'slug' => 'Easter',
            'date' => '2023-04-09',
        ]);
        Date::create([
            'slug' => 'Christmas',
            'date' => '2023-12-25',
        ]);
        Date::create([
            'slug' => 'LithuaniasIndependence',
            'date' => '2024-3-11',
        ]);
        		
    }
}
