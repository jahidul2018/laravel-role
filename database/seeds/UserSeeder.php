<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'jahiduk.alam13@gmail.com')->first();
        if (is_null($user)) {
            $user = new User();
            $user->name = "Jahidul Alam";
            $user->email = "jahiduk.alam13@gmail.com";
            $user->password = Hash::make('12345678');
            $user->save();
        }
    }
}
