<?php

namespace Database\Seeders;

use App\Models\Topic;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            Topic::find($i)->assignments()->create([
                'title' => 'Bài tập tuần ' . $i,
                'description' => 'Các em làm hết bài tập và nộp đúng hạn. Trễ một phút trừ 0.1 điểm',
                'start_date' => Carbon::tomorrow()->addDays(7*$i),
                'deadline' => Carbon::tomorrow()->addDays(7+7*$i)
            ]);
        }
    }
}
