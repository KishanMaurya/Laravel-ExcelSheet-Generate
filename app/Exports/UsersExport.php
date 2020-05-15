<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersExport implements FromQuery, WithMapping , WithHeadings , WithColumnFormatting 
{
   

    /**
     * @return array
     */
    // public function sheets(): array
    // {
    //     $sheets = [];

    //     for ($month = 1; $month <= 12; $month++) {
    //         $sheets[] = new UsersPerMonthSheet();
    //     }

    //     return $sheets;
    // }


    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::where('id','>',25);
    }

    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
            Date::dateTimeToExcel($user->created_at),
        ];
    }
    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'created_at',
        ];
    }
    public function columnFormats(): array
    {
        return [
            'C' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    
}
