<?php

namespace Database\Seeders;

use App\Models\Degree;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Degree::create([
            'name' => 'Thạc sĩ'
        ]);
        Degree::create([
            'name' => 'Tiến sĩ'
        ]);
        Degree::create([
            'name' => 'Phó giáo sư'
        ]);
        Degree::create([
            'name' => 'Giáo sư'
        ]);
    }
}
