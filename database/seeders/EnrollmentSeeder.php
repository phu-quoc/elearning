<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::find(1)->enrollments()->create([
            'course_id' => 1,
            'semester' => 2,
            'school_year_id' => 2
        ]);
    }
}
