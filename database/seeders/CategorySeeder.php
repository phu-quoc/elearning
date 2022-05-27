<?php

namespace Database\Seeders;

<<<<<<< HEAD
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
=======
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
>>>>>>> 7a59d1eab0c2ebdf1a33869e87430337c498adba

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        DB::table('categories')->insert([
            ['name'=> 'Đại cương'],
            ['name'=> 'Chuyên ngành'],
=======
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
>>>>>>> 7a59d1eab0c2ebdf1a33869e87430337c498adba
        ]);
    }
}
