<?php

namespace App\Repositories;

class SalesRepository
{
    public function between($startDate, $endDate) {
        // The operation could be like below in real project
        // return DB::table('ex_sales')->whereBetween('created_at',
        //      [$startDate, $endDate])->sum('charge') / 100;

        return 52.87; // For now, we just return dummy result.
    }
}