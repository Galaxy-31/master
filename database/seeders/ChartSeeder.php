<?php

namespace Database\Seeders;

use App\Models\Chart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chartArray = [
            [
                'code' => '401',
                'name' => 'Gaji Karyawan',
                'category' => 'Salary',
            ],
            [
                'code' => '402',
                'name' => 'Gaji Ketua MPR',
                'category' => 'Salary',
            ],
            [
                'code' => '403',
                'name' => 'Profit Trading',
                'category' => 'Other Income',
            ],
            [
                'code' => '601',
                'name' => 'Biaya Sekolah',
                'category' => 'Family Expense',
            ],
            [
                'code' => '602',
                'name' => 'Bensin',
                'category' => 'Transport Expense',
            ],
            [
                'code' => '603',
                'name' => 'Parkir',
                'category' => 'Transport Expense',
            ],
            [
                'code' => '604',
                'name' => 'Makan Siang',
                'category' => 'Meal Expense',
            ],
            [
                'code' => '605',
                'name' => 'Makan Pokok Bulanan',
                'category' => 'Meal Expense',
            ],
        ];

        foreach($chartArray as $value) {
            Chart::create($value);
        }
    }
}
