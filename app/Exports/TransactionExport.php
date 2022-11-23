<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TransactionExport implements FromQuery, WithHeadings
{
    use Exportable;

    /**
    * @param Transaction $transaction
    * 
    * @return \Illuminate\Support\Collection
    */

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return Transaction::query()->where('id', $this->id);
    }
    
    // public function columnFormats(): array
    // {
    //     return [
    //         'A' => NumberFormat::FORMAT_TEXT,
    //         'B' => NumberFormat::FORMAT_NUMBER,
    //         'C' => NumberFormat::FORMAT_TEXT,
    //     ];
    // }

    public function headings(): array
    {
        return ["your", "headings", "here"];
    }
    
    // public function map($transaction): array
    // {
    //     return [
    //         'Name' => $transaction->name,
    //         'Total' => $transaction->credit + $transaction->debit,
    //         'Date' => $transaction->date,
    //     ];
    // }
}
