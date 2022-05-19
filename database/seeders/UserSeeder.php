<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 5; $i++)
        {
            User::create([
                'first_name' => 'Phạm',
                'last_name' => 'Toàn Phúc',
                'email' => 'ptphuc.20it'.$i.'@vku.udn.vn',
                'google_id' => 'id',
                'department_id' => 1,
                'remember_token' => 1
            ]);
        }
        User::create([
            'first_name' => 'Nguyễn',
            'last_name' => 'Anh Tuấn',
            'email' => 'natuan@vku.udn.vn',
            'google_id' => 'id',
            'department_id' => 1,
            'remember_token' => 1,
            'user_type' => 2
        ]);
    }
}
