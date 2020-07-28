<?php

use App\Models\Addons;
use App\Models\Service;
use App\Models\Service_offer;
use App\Models\Service_Place;
use App\Models\Service_Season;
use App\Models\ServiceFood;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;

function get_translation_category($all_translated,$lang)
{
    App::setLocale($lang);
    $final_translated =[];
    foreach ($all_translated as $translated)
    {
        $single_data= [];
        $single_data['id'] = $translated->id ;
        $single_data['name']= $translated->name;
        $single_data['image']= $translated->image;
        array_push($final_translated,$single_data);
    }
    return $final_translated;
}



function not_allowed_filter()
{
    return response()->json([
        "status" => 406,
        "message" => 'this filter not allwed for this category',
        "data"  => [],
    ], 406);
}


function final_price($service_id , $date)
{
    $service = Service::find($service_id);

    if($service->main_category == 1){

        /** seasson */
        $sesson_price = Service_Season::select('price_per_day' , 'price_per_morning' , 'price_per_evening')
        ->where('service_id' , $service_id)
        ->whereDate('date_from' , '<=' , $date)
        ->whereDate('date_to' , '>=' , $date)
        ->first();

        if($sesson_price){
            $min_price = clac_min_price($sesson_price->price_per_day , $sesson_price->price_per_morning , $sesson_price->price_per_evening );
            if($min_price){
                $sesson_price['min_price'] = $min_price;
            }
            $prices = $sesson_price;
        }else{
            $prices = Service_Place::select('price_per_day' , 'price_per_morning' , 'price_per_evening' , 'min_price')
            ->where('service_id' , $service_id)
            ->first();
        }
        
    }else if($service->main_category == 2){
        $food = ServiceFood::select('price_per_item')
        ->where('service_id' , $service_id)
        ->first();
        $prices = $food->price_per_item ? ['price_per_item' => $food->price_per_item] : [];
    }else{
        return [];
    }
                    

    $offer = Service_offer::select('discount_type' , 'discount_value')
    ->where('service_id' , $service_id)
    ->whereDate('date_from' , '<=' , $date)
    ->whereDate('date_to' , '>=' , $date)
    ->first();

    $oldPrices = $prices;
    $offerValue = null;
    if($offer){
        $oldPrices = $prices;
        switch ($offer->discount_type) {
            case 'cash':
                $offerValue = App::getLocale() == "ar" ?  "ج.م ". $offer->discount_value : $offer->discount_value . " EG";
                $prices = collect($prices)->map(function($item) use($offer){
                    return ($item - $offer->discount_value);
                });

            break;
            
            case 'percentage':
                $offerValue = $offer->discount_value.' %';
                $prices = collect($prices)->map(function($item) use($offer){
                    return ($item * $offer->discount_value)/100;
                });

            break;

            default:
                $prices = [];
            break;
        }
        
    }
    $prices['old_prices'] = $oldPrices;
    $prices['offer'] = $offerValue;
    return $prices;
    
}

function convert_sync_addons_data($array)
{
    $output = [];
    foreach ($array as $key => $value){
        if(Addons::find((int) $key)){
            $output[$key] = ['quantity' => $value];
        }
    }
    return $output;
}


function responseSuccess($data = [] ,$msg = null , $code = 200)
{
    return response()->json([
        "status"  => $code,
        "message" => $msg,
        "data"    => $data
    ],$code);
}


function responseFail($msg = null , $code = 406)
{
    return response()->json([
        "status"  => $code,
        "message" => $msg,
    ],$code);
}

function encrypted ($data){
    $encrypted = Crypt::encryptString($data);
    return $encrypted;
}

function decrypted ($encrypted){
    $decrypted = Crypt::decryptString($encrypted);
    return $decrypted;
}

function clac_min_price($price1 = null , $price2 = null, $price3 = null)
{
    $data[0] = $price1;
    $data[1] = $price2;
    $data[2] = $price3;

    $min = min($data);

    if($min > 0){
        return $min;
    }else{
        return null;
    }
}