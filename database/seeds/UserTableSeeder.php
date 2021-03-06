<?php

use Illuminate\Database\Seeder;
use App\Models\User;
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
            'username' => 'mohdkhalilsabba',
            'email' => 'mohdkhalilsabba@gmail.com',
            'gender' => 'M',
            'private' => 0,
            'password' => '$2y$10$AYeqgLZhkbH.5r15MjAdAe0VW5TN4wCpZbbDRNznmUEhQBtRvmm2O',
            'bio' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta voluptatum cupiditate non minima, sed dolorum illum eveniet aliquam, maiores incidunt porro, quasi veniam earum saepe! Exercitationem, a quasi vitae placeat.',
            'avatar' => 'default-user.png',
          ]);
        $user->save();
    }
}
