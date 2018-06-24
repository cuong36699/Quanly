<?php

use Illuminate\Database\Seeder;
use App\Models\Landlord;
use App\Models\Oppidan;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Landlord::truncate();
   
        Oppidan::all()->each(function ($oppidan)
        {
        	$oppidan->landlord()->save(factory(Landlord::class)->make());
        });
    }
}
