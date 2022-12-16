<?php

namespace Database\Seeders;

use App\Models\Book;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new Book();
        $book->name = "ABCs for Adults";
        $book->save();

        $book = new Book();
        $book->name = "1001 Dad Jokes";
        $book->loan_date = Carbon::now();
        $book->return_date = Carbon::now()->addDays(7);
        $book->user_id = 1;
        $book->save();

        $book = new Book();
        $book->name = "Pastry Recipes for Dads";
        $book->loan_date = Carbon::now();
        $book->return_date = Carbon::now()->addDays(7);
        $book->user_id = 1;
        $book->save();

        $book = new Book();
        $book->name = "Dance Choreographies";
        $book->loan_date = Carbon::now();
        $book->return_date = Carbon::now()->addDays(7);
        $book->user_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "Elon Musk Biographic Journey";
        $book->save();
    }
}
