<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Admin A';
        $user->email = 'manager@abc.com';
        $user->password = Hash::make('wars1234');
        $user->info_id = 1;
        $user->info_type = 'App\Models\Admin';
        $user->save();

        $user = new User();
        $user->name = 'Admin B';
        $user->email = 'staff@abc.com';
        $user->password = Hash::make('wars1234');
        $user->info_id = 2;
        $user->info_type = 'App\Models\Admin';
        $user->save();

        $user = new User();
        $user->name = 'Customer A';
        $user->email = 'a@abc.com';
        $user->password = Hash::make('wars1234');
        $user->info_id = 1;
        $user->info_type = 'App\Models\Customer';
        $user->save();

        $user = new User();
        $user->name = 'Customer B';
        $user->email = 'b@abc.com';
        $user->password = Hash::make('wars1234');
        $user->info_id = 2;
        $user->info_type = 'App\Models\Customer';
        $user->save();
    }
}
