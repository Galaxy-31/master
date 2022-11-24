<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransactionExport implements FromCollection, WithHeadings, ShouldAutoSize, WithMapping
{
    use Exportable;

    /**
    * @param Transaction $transaction
    * 
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return Transaction::all();
    }

    public function map($transaction): array
    {
        return [
            [
                $transaction->name,
                $transaction->dates,
            ],
        ];
    }

    public function headings(): array
    {
        return ["Name"];
    }
}
