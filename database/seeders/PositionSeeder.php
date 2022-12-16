<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = new Position();
        $position->name = "Manager";
        $position->save();

        $position = new Position();
        $position->name = "Staff";
        $position->save();
    }
}
