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
        $categoryArray = [
            [
                'name' => 'Salary',
            ],
            [
                'name' => 'Other Income',
            ],
            [
                'name' => 'Family Expense',
            ],
            [
                'name' => 'Transport Expense',
            ],
            [
                'name' => 'Meal Expense',
            ],
        ];

        foreach($categoryArray as $value) {
            Category::create($value);
        }
    }
}
