<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionArray = [
            [
                'dates' => '2022-11-23',
                'code' => '401',
                'name' => 'Gaji Karyawan',
                'desc' => 'Gaji Di Perusahaan A',
                'debit' => 0,
                'credit' => 5000000,
            ],
            [
                'dates' => '2022-11-23',
                'code' => '402',
                'name' => 'Gaji Ketua MPR',
                'desc' => 'Gaji Ketum',
                'debit' => 0,
                'credit' => 7000000,
            ],
            [
                'dates' => '2022-11-23',
                'code' => '602',
                'name' => 'Bensin',
                'desc' => 'Bensin Anak',
                'debit' => 25000,
                'credit' => 0,
            ],
        ];

        foreach($transactionArray as $value) {
            Transaction::create($value);
        }
    }
}
