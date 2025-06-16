<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' => 'PSVOBD Bangladesh',
            'phone' => '01302224451',
            'address' => 'Tamat Bazar',
            'language' => 'en',
            'logo' => 'company-c3ef51b2-811c-4ca8-bf26-82ff1d2913db.png',
            'chairman_image' => 'chairman_image-6fa8ed3e-b081-4e47-87c4-71576a9cae1c.png',
            'secretary_image' => 'secretary_image-875d1090-3f8a-4f54-b47d-c1e8caf72d57.png',
            'chairman_text' => 'Welcome to Expatriate Social Voluntary Organization',
            'secretary_text' => 'Welcome to Expatriate Social Voluntary Organization',
            'about_us' => 'Welcome to Expatriate Social Voluntary Organization',
            'terms_and_condition' => 'Welcome to Expatriate Social Voluntary Organization',
        ]);
    }
}
