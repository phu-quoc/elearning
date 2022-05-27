<?php

namespace Database\Seeders;

use App\Models\Resource;
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
            Resource::create([
                'topic_id' => $i,
                'title' => 'Assignment '.$i,
                'description' => 'Bài cơ bản',
                'resource_type' => 4
            ])->assignment()->create([
                'start_date' => Carbon::tomorrow(),
                'deadline' => Carbon::tomorrow()->addDays(7)
            ]);
        }
    }
}
