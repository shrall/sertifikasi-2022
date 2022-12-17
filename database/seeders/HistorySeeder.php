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
        $history = new History();
        $history->loan_date = Carbon::now()->subDays(14);
        $history->loan_due = Carbon::now()->subDays(7);
        $history->user_id = 3;
        $history->book_id = 1;
        $history->status_id = 1;
        $history->save();

        $history = new History();
        $history->loan_date = Carbon::now();
        $history->loan_due = Carbon::now()->addDays(7);
        $history->user_id = 3;
        $history->book_id = 2;
        $history->status_id = 2;
        $history->save();

        $history = new History();
        $history->loan_date = Carbon::now()->subDay();
        $history->loan_due = Carbon::now()->addDays(6);
        $history->user_id = 3;
        $history->book_id = 3;
        $history->status_id = 2;
        $history->save();

        $history = new History();
        $history->loan_date = Carbon::now()->subDays(4);
        $history->loan_due = Carbon::now()->addDays(3);
        $history->user_id = 4;
        $history->book_id = 4;
        $history->status_id = 2;
        $history->save();
    }
}
