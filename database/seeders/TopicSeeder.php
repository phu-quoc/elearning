<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Course::find(1)->topics()->create([
                'name' => 'Tuần ' . $i
            ]);
            if ($i == 5) {
                Course::find(1)->topics()->create([
                    'name' => 'Thi giữa kỳ'
                ]);
            }
        }
    }
}
