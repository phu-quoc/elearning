<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['name'=>'20GIT', 'department_id'=> 1],
            ['name'=>'20SE1', 'department_id'=> 1],
            ['name'=>'20SE2', 'department_id'=> 1],
            ['name'=>'20SE3', 'department_id'=> 1],
            ['name'=>'20CE1', 'department_id'=> 2],
            ['name'=>'20CE2', 'department_id'=> 2],
            ['name'=>'20GBA', 'department_id'=> 3],
            ['name'=>'20DM', 'department_id'=> 3],
            ['name'=>'20BA', 'department_id'=> 3],
        ]);
    }
}
