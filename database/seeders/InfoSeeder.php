<?php

namespace Database\Seeders;

use App\Models\Info;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $info = [
        ['user_id' => 1, 'nrtel' => '123123123', 'email'=>'test@example.com','otwarcienormal'=>'17.00 - 21.00','otwarcieweekend'=>'10.00 - 14.00', 'adres' => 'ul. Biblioteczna 1, 00-001 Warszawa']
    ];

        Info::insert($info);
    }
}