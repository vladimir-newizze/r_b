<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Settings::insert([
            [
                'Meshulam_API_KEY' => 'xxx', 
                'Meshulam_API_SECRET' => 'xxx', 
                'Meshulam_API_KEY' => 'xxx', 
                'Meshulam_API_SECRET' => 'xxx'
            ],
        ]);
    }
}
