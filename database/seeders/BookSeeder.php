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
        $book->name = "Almanack of Naval Ravikant";
        $book->image = "almanack.jpg";
        $book->status_id = 1;
        $book->save();

        $book = new Book();
        $book->name = "Percy Jackson and The Lightning Thief";
        $book->image = "percy.jpg";
        $book->status_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "Harry Potter and The Sorcerer's Stone";
        $book->image = "harry.jpg";
        $book->status_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "Asian Food Recipes";
        $book->image = "recipe.jpg";
        $book->status_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "The Big Book of Dad Jokes";
        $book->image = "dadjoke.jpg";
        $book->status_id = 1;
        $book->save();
    }
}
