<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;

class TransactionExport implements FromQuery
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return DB::select('select * from users where active = ?', [1]);
    }

    public function headings(): array
    {
        return [
            '#',
            'Date',
            'Category',
            'Amount',
        ];
    }
}
