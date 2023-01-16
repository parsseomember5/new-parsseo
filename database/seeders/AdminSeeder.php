<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'شاهو قادری',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'bio' => 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.',
            'instagram' => '#',
            'twitter' => '#',
            'linkedin' => '#',
        ]);
    }
}
