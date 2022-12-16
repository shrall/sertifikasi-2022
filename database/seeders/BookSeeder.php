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
        $book->description = "GETTING RICH IS NOT JUST ABOUT LUCK; HAPPINESS IS NOT JUST A TRAIT WE ARE BORN WITH. These aspirations may seem out of reach, but building wealth and being happy are skills we can learn. So what are these skills, and how do we learn them? What are the principles that should guide our efforts? What does progress really look like? Naval Ravikant is an entrepreneur, philosopher, and investor who has captivated the world with his principles for building wealth and creating long-term happiness. The Almanack of Naval Ravikant is a collection of Naval's wisdom and experience from the last ten years, shared as a curation of his most insightful interviews and poignant reflections. This isn't a how-to book, or a step-by-step gimmick. Instead, through Naval's own words, you will learn how to walk your own unique path toward a happier, wealthier life.";
        $book->image = "almanack.jpg";
        $book->status_id = 1;
        $book->save();

        $book = new Book();
        $book->name = "Percy Jackson and The Lightning Thief";
        $book->description = "Percy Jackson is about to be kicked out of boarding school ... again. And that's the least of his troubles. Lately, mythological monsters and the gods of Mount Olympus seem to be walking straight out of the pages of Percy's Greek mythology textbook and into his life. And worse, he's angered a few of them. Zeus's master lightning bolt has been stolen, and Percy is the prime suspect. Now Percy and his friends have just ten days to find and return Zeus's stolen property and bring peace to a warring Mount Olympus. But to succeed on his quest, Percy will have to do more than catch the true thief: he must comes to terms with the father who abandoned him; solve the riddle of the Oracle, which warns him of betrayal by a friend; and unravel a treachery more powerful than the gods themselves.";
        $book->image = "percy.jpg";
        $book->status_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "Harry Potter and The Sorcerer's Stone";
        $book->description = "In Harry Potter and the Sorcerer's Stone, Harry, an orphan, lives with the Dursleys, his horrible aunt and uncle, and their abominable son, Dudley. One day just before his eleventh birthday, an owl tries to deliver a mysterious letter?the first of a sequence of events that end in Harry meeting a giant man named Hagrid. Hagrid explains Harry's history to him: When he was a baby, the Dark wizard, Lord Voldemort, attacked and killed his parents in an attempt to kill Harry; but the only mark on Harry was a mysterious lightning-bolt scar on his forehead. Now he has been invited to attend Hogwarts School of Witchcraft and Wizardry, where the headmaster is the great wizard Albus Dumbledore. Harry visits Diagon Alley to get his school supplies, especially his very own wand.";
        $book->image = "harry.jpg";
        $book->status_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "Asian Food Recipes";
        $book->description = "Favorite Chinese recipes include: Crispy Shrimp Dumplings Kung Pao Chicken Sweet-and-Sour Pork Homestyle Chow Mein Noodles Mongolian Beef And many more… Building off her passion, expertise and the avid following she has on her website, rasamalaysia.com, the Internet's most popular Asian food and cooking site, Easy Chinese Recipes is sure to become the go-to book for cooks interested in creating Chinese meals at home.";
        $book->image = "recipe.jpg";
        $book->status_id = 2;
        $book->save();

        $book = new Book();
        $book->name = "The Big Book of Dad Jokes";
        $book->description = "Put an end to courtesy laughs and awkward silences with the jokes in this book! From the people who brought you Uncle John’s Bathroom Reader, this is an eclectic collection of the punniest, funniest, most outrageous knee-slappers that have ever been told! At work, at home, at the game—Dad will beat them all to the punch—line, that is!";
        $book->image = "dadjoke.jpg";
        $book->status_id = 1;
        $book->save();
    }
}
