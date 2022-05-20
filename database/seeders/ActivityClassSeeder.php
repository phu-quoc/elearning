<?php

namespace Database\Seeders;

use App\Models\ActivityClass;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::find(1)->activityClasses()->create([
            'name' => '20GIT'
        ]);
        Department::find(1)->activityClasses()->create([
            'name' => '20SE1'
        ]);
        Department::find(1)->activityClasses()->create([
            'name' => '20SE2'
        ]);
        Department::find(1)->activityClasses()->create([
            'name' => '20SE3'
        ]);
        Department::find(2)->activityClasses()->create([
            'name' => '20CE1'
        ]);
        Department::find(2)->activityClasses()->create([
            'name' => '20CE2'
        ]);
        Department::find(3)->activityClasses()->create([
            'name' => '20GBA'
        ]);
        Department::find(3)->activityClasses()->create([
            'name' => '20DM'
        ]);
        Department::find(3)->activityClasses()->create([
            'name' => '20BA'
        ]);
       
    }
}
