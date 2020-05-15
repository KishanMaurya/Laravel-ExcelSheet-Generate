<?php 
namespace App\Exports\Sheets;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithTitle;

class UsersPerMonthSheet implements FromQuery, WithTitle
{
    /**
     * @return Builder
     */
    public function query()
    {
        return User::query()->where('id' , '>' , 25);
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return 'Month ';
    }
}