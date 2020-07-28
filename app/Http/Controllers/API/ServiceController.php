<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceServicePlaceRequest;
use App\Http\Requests\RecentViewServicesRequest;
use App\Http\Requests\WishListRequest;
use App\Http\Resources\RecentViewServicesResource;
use App\Http\Resources\RelatedServiceFood;
use App\Http\Resources\RelatedServicePlace;
use App\Http\Resources\ServiceFoodData;
use App\Http\Resources\ServicePlaceData;
use App\Http\Resources\wishListService;
use App\Models\Service;
use App\Models\Service_offer;
use App\Models\Service_Place;
use App\Models\Service_Season;
use App\Models\ServiceFood;
use App\Models\ServiceWishList;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /*************** get service details***************/
    public function get_service_details($service_id)
    {
        $service = Service::select('main_category')->find($service_id);

        if (!$service) {
            return response()->json([
                "status" => 404,
                "message" => 'there is no service with this id !',
            ], 404);
        }

        if ($service->main_category == 1) {

            return $this->get_service_place_details($service_id);
        } else if ($service->main_category == 2) {

            return $this->get_service_food_details($service_id);
        } else {

            return response()->json([
                "status" => 404,
                "message" => 'there is no service with this id !',
            ], 404);
        }
    }

    public function get_service_place_details($service_id)
    {
        $service = Service::select('id', 'main_category', 'business_type_id', 'min_deposit', 'cancel_free', 'cancel_fees', 'provider_id')
            ->with(
                'Service_Place',
                'Service_images',
                'category',
                'subCategory',
                'Service_fits_with',
                'Service_setup',
                'provider:id,brand_name,logo',
                'Service_addons',
                'Service_feature_indoor',
                'Service_feature_outdoor',
                'Service_one_address',
                'Service_packages_by_date'
            )
            ->where(['id' => $service_id])
            ->first();


        if (!$service->Service_one_address) {
            return response()->json([
                "status" => 406,
                "message" => 'there is no address for this service !',
            ], 406);
        }

        return response()->json([
            "status" => 200,
            "message" => 'Data returned Successfully',
            'data' => new ServicePlaceData($service)
        ], 200);
    }

    public function get_service_food_details($service_id)
    {
        $service = Service::select(
            'id',
            'main_category',
            'business_type_id',
            'preparation_time',
            'preparation_time_type',
            'cancel_free',
            'cancel_fees',
            'provider_id'
        )
            ->with(
                'Service_Food',
                'Service_images',
                'category',
                'subCategory',
                'Service_foodType',
                'Service_fits_with',
                'provider:id,brand_name,logo',
                'Service_provider_address',
                'Service_addons',
                'Service_packages_by_date'
            )
            ->where(['id' => $service_id])
            ->first();


        if (!$service->Services_address) {
            return response()->json([
                "status" => 406,
                "message" => 'there is no address for this service !',
            ], 406);
        }

        return response()->json([
            "status" => 200,
            "message" => 'Data returned Successfully',
            'data' => new ServiceFoodData($service)
        ], 200);
    }

    /*************** get related services ***************/
    public function get_related_service($service_id)
    {
        $service = Service::find($service_id);

        if (!$service) {
            return response()->json([
                "status" => 404,
                "message" => 'there is no service with this id !',
            ], 404);
        }

        if ($service->main_category == 1) {

            return $this->get_related_service_place($service);
        } else if ($service->main_category == 2) {

            return $this->get_related_service_food($service);
        } else {

            return response()->json([
                "status" => 404,
                "message" => 'there is no service with this id !',
            ], 404);
        }
    }

    public function get_related_service_place($service)
    {
        $fits_with = $service->Service_fits_with->pluck('id');

        $ids = Service::select('services.id', 'service_fits_with.fits_with_id')
            ->join('service_fits_with', function ($join) use ($fits_with) {
                $join->on('services.id', '=', 'service_fits_with.service_id')
                    ->whereIn('service_fits_with.fits_with_id', $fits_with);
            })->pluck('services.id')->toArray();

        $service_ids = array_keys(array_filter(array_count_values($ids), function ($item) {
            if ($item >= 2) {
                return $item;
            }
        }));

        $result = Service::select('id', 'business_type_id', 'provider_id')
            ->with(
                'service_place:id,min_price,service_id,max_capacity',
                'Service_packages_by_date',
                'Service_offer_by_date:service_id,discount_type,discount_value',
                'subCategory:id',
                'Service_images:url,service_id',
                'service_one_address:neighborhood_ar,neighborhood_en,foreign_id'
            )
            ->where('id', '!=', $service->id)
            ->where(['business_type_id' => $service->business_type_id])
            ->where(function ($query) use ($service, $service_ids) {
                return $query->whereIn('id', $service_ids)
                    ->whereHas('service_one_address', function (Builder $query) use ($service) {
                        $query->where('city_en', $service->service_one_address->city_en)
                            ->orWhere('city_ar', $service->service_one_address->city_ar);
                    });
            })
            ->take(15)->get();

        return response()->json([
            "status" => 200,
            "message" => 'Data returned successfully',
            "data"  => RelatedServicePlace::collection($result)
        ], 200);
    }

    public function get_related_service_food($service)
    {
        $result = Service::select('id', 'business_type_id', 'provider_id')
            ->with(
                'service_food:id,max_num_order_day,price_per_item,service_id',
                'subCategory:id',
                'Service_images:url,service_id',
                'Service_packages_by_date',
                'Service_offer_by_date:service_id,discount_type,discount_value',
                'service_one_address:neighborhood_ar,neighborhood_en,foreign_id',
                'Service_foodType:feature_id,service_id'
            )
            ->where('id', '!=', $service->id)
            ->where(['business_type_id' => $service->business_type_id])
            ->where(function ($query) use ($service) {
                return $query->whereHas('Service_foodType', function (Builder $query) use ($service) {
                    $query->whereIn('feature_id', $service->Service_foodType->pluck('id'));
                })
                    ->whereHas('service_one_address', function (Builder $query) use ($service) {
                        $query->where('city_en', $service->service_one_address->city_en)
                            ->orWhere('city_ar', $service->service_one_address->city_ar);
                    });
            })
            ->take(15)->get();

        return response()->json([
            "status" => 200,
            "message" => 'Data returned successfully',
            "data"  => RelatedServiceFood::collection($result)
        ], 200);
    }


    /*************** services wishList ***************/
    public function add_service_to_wishList(WishListRequest $request)
    {
        if (empty(Service::find($request->service_id))) {
            return response()->json([
                "status" => 406,
                "message" => 'No service with this id !',
            ], 406);
        }

        $data = ServiceWishList::firstOrCreate(['service_id' => $request->service_id, 'user_id' => auth('api')->user()->id]);

        if ($data) {
            return response()->json([
                "status" => 200,
                "message" => 'Data saved Successfully',
            ], 200);
        }
    }

    public function get_service_from_wishList(WishListRequest $request)
    {
        $page_size = $request->page_size ?? 10;
        $user_id = auth('api')->user()->id;

        $data = ServiceWishList::with('service', 'service_image')->where(['user_id' => $user_id])->paginate($page_size);
        $final_services = $data->toArray();
        $final_services['data'] = wishListService::collection($data);

        if ($data) {
            return response()->json([
                "status" => 200,
                "message" => 'Data returned Successfully',
                'data' => $final_services  ?? []
            ], 200);
        }
    }

    public function delete_service_from_wishList($service_id)
    {
        if (empty(Service::find($service_id))) {
            return response()->json([
                "status" => 406,
                "message" => 'No service with this id !',
            ], 406);
        }

        $data = ServiceWishList::where(['service_id' => $service_id, 'user_id' => auth('api')->user()->id])->delete();

        if ($data) {
            return response()->json([
                "status" => 200,
                "message" => 'Data removed Successfully',
            ], 200);
        } else {
            return response()->json([
                "status" => 406,
                "message" => 'some thing wrong !',
            ], 406);
        }
    }


    /***************get service prices ***************/
    public function get_service_price(PriceServicePlaceRequest $request)
    {
        $date = date('Y-m-d', strtotime($request->date));

        $result = final_price($request->service_id, $date);

        return responseSuccess($result, 'data returned successfully');
    }


    /***************get rrecent view services ***************/
    public function get_recent_view_services(RecentViewServicesRequest $request)
    {
        $data = Service::select('id', 'main_category', 'business_type_id')
            ->with('Service_Place', 'Service_Food', 'category:id', 'subCategory:id', 'Service_offer_by_date', 'Service_packages_by_date')
            ->whereIn('id', $request->services_ids)
            ->get();

        return responseSuccess(RecentViewServicesResource::collection($data), 'data returned successfully');
    }
}
