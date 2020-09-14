<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 20; $i++) {
            User::create([
                'name' => 'Lê Trọng Nghĩa',
                'email' => 'trongnghia1998tn'.$i.'@gmail.com',
                'email_verified_at' => new DateTime(),
                'password' => bcrypt('12345678'),
                'remember_token' => 1,
                'phone' => '0968193632',
                'gender' => 1,
                'role' => 0,
            ]);
        }
    }
}
