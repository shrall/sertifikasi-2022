<?php

namespace Database\Seeders;

use App\Models\History;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $histlory = new History();
        $histlory->loan_date = Carbon::now();
        $histlory->return_date = Carbon::now()->addDays(7);
        $histlory->user_id = 3;
        $histlory->book_id = 2;
        $histlory->save();

        $histlory = new History();
        $histlory->loan_date = Carbon::now()->subDay();
        $histlory->return_date = Carbon::now()->addDays(6);
        $histlory->user_id = 3;
        $histlory->book_id = 3;
        $histlory->save();

        $histlory = new History();
        $histlory->loan_date = Carbon::now()->subDays(4);
        $histlory->return_date = Carbon::now()->addDays(3);
        $histlory->user_id = 4;
        $histlory->book_id = 4;
        $histlory->save();
    }
}
