<?php

use App\Profile;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\User::create([
            'name'=>"test test",
            "email"=>"hassanaboeata@gmail.com",
            'password'=>bcrypt('password'),
            'admin'=>1
        ]);

        App\Profile::create([
            'user_id'=>$user->id,
            "about"=>"Lorem Ebsem Test Y% For Linked to prefe tis asd ",
            "facebook"=>"facecbook.com/HassanELshazlyEida",
            'youtube'=>"youtube.com",
            'avatar'=>"www.image.com"
        ]);
    }
}
