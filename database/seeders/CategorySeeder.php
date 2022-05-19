<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Toán và KHTN'
        ]);
        Category::create([
            'name' => 'Kiến thức chung'
        ]);
        Category::create([
            'name' => 'Kiến thức Cơ sở ngành'
        ]);
        Category::create([
            'name' => 'Kiến thức Chuyên ngành'
        ]);
        Category::create([
            'name' => 'Thực tập'
        ]);
        Category::create([
            'name' => 'Đồ án tốt nghiệp/Luận văn'
        ]);
    }
}
