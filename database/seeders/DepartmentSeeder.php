<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'Khoa học máy tính'
        ]);
        Department::create([
            'name' => 'Kỹ thuật máy tính và Điện tử'
        ]);
        Department::create([
            'name' => 'Kinh tế số và Thương mại điện tử'
        ]);
    }
}
