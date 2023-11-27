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
     */
    public function run(): void
    {
        $user = User::create([
            'first_name'=>'Adil',
            'Last_name'=>'Chergui I Guess',
            'phone'=>'098276363',
            'email'=>'agency@company.com ',
            'password'=>Hash::make('Trololo123@'),
        ]);
        $user->assignRole('admin');
    }
}
