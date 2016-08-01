<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User([
            'first_name' => 'Moh\'d',
            'last_name' => 'Khalil',
            'email' => 'mohdkhalilsabba@gmail.com',
            'gender' => 'M',
            'private' => 0,
            'password' => '$2y$10$AYeqgLZhkbH.5r15MjAdAe0VW5TN4wCpZbbDRNznmUEhQBtRvmm2O'
          ]);
        $user->save();
    }
}
