<?php

use App\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name'=>"laravel blog ",
            'address'=>"cairo,giza ",
            'contact_number'=>"01147439571",
            'contact_email'=>"hassanaboeata@gmail.com",
        ]);
    }
}
