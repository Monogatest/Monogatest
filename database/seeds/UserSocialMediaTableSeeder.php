<?php

use Illuminate\Database\Seeder;
use App\Models\UserSocialMedia;
class UserSocialMediaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $socialMedia = new UserSocialMedia([
        'user_id' => '1',
        'facebook' => 'MohdKhalilSabba',
        'instagram' => 'MohdKhalilSabba',
        'snapchat' => 'MohdKhalilSabba',
        'twitter' => 'MohdKhalilSabba',
      ]);
      $socialMedia->save();
        //
    }
}
