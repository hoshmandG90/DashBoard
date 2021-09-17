<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\transactions;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeSheet;

class TransactionsExport implements FromQuery,WithMapping,WithHeadings,WithEvents
{
    
    use Exportable;

    protected $selected=[];

    public function __construct($selected){
        $this->selected = $selected;
    }
 

    public function query()
    {
        return transactions::whereIn('id',$this->selected);
    }

    public function headings(): array
    {

        return [
            'Title',
            'status',

            'Amount',
            'Date',

            'Created_at'
        ];
    }
    public function registerEvents(): array
    {
        
   

    }


    public function map($transactions): array
    {
        return [
            $transactions->title,
            $transactions->status,

            "$ ".$transactions->amount." USD",
            $transactions->date->format('d-m-Y'),
            $transactions->created_at->format('M , d Y'),

        ];
    }


}
