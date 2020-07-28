<?php

use App\Models\provider_address;
use App\Models\Service;
use App\Models\Service_Place;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSearchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 5000; $i++) { 
            $s = [
                'provider_id' => 1,
                'business_type_id' => 9,
                'status' => 1,
            ];
            $service_id = Service::insertGetId($s);

            $service = Service::find($service_id);
            $place = $service->fill([
                "name:en"=> "we kman",
                "description:en"=> "hgdjhfdfd jfdhghjf jhdfghdgfd jdhgfdjhgd",
                "name:ar"=> "تجربه اضافه ",
                "description:ar"=> "hgdjhfdfd jfdhghjf jhdfghdgfd jdhgfdjhgd",
            ]);
            $place->save();

            $sp = [
                'provider_id' => 1,
                'service_id' => $service_id,
            ];
            $service_place_id = Service_Place::insert($sp);

            $p = [
                'foreign_id' => $service_id,
                'address_ar' => 'القاهره'.$i,
                'address_en' => 'cairo'.$i,
                'country_ar' => 'القاهره'.$i,
                'country_en' => 'cairo'.$i,
                'city_ar' => 'القاهره'.$i,
                'city_en' => 'cairo'.$i,
                'neighborhood_ar' => 'القاهره'.$i,
                'neighborhood_en' => 'cairo'.$i,
                'lat' => '31.186019'.$i,
                'lng' => '29.888855'.$i,
                'type' => 'place_address',
                'status' => 0
            ];
            $provider_address = provider_address::insert($p);
        }

    
    }
}
