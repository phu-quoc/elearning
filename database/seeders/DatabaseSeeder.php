<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(DegreeSeeder::class);
<<<<<<< HEAD
        $this->call(CategorySeeder::class);
=======
        $this->call(SchoolYearSeeder::class);
        $this->call(ActivityClassSeeder::class);
        $this->call(LecturerSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(AssignmentSeeder::class);
        $this->call(EnrollmentSeeder::class);
        $this->call(ResourceSeeder::class);
>>>>>>> 7a59d1eab0c2ebdf1a33869e87430337c498adba
    }
}
