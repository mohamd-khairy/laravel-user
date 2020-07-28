<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\RemoveReservationAddonsRequest;
use App\Http\Requests\reservationServiceRequest;
use App\Http\Requests\UpdateReservationRequest;
use App\Http\Resources\reservationReseourse;
use App\Models\Reservation;
use App\Models\ReservationAddon;
use App\Models\Service;
use App\Models\Service_Close_Date;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    public function get_reservations_list()
    {
        $user_id = auth('api')->user()->id;
        $reservations = Reservation::with('service:id,provider_id,main_category', 'reservation_addons')
            ->select('id', 'reservation_date', 'quantity', 'service_id', 'price_slot')
            ->where('user_id', $user_id)
            ->get();

        $reservations =  reservationReseourse::collection($reservations);
        $reservations_sub_total = collect($reservations)->map(function ($item) {
            if (date('Y-m-d', strtotime($item['reservation_date'])) >= date('Y-m-d')) {
                return $item;
            }
        })->sum('service_total');
        $shipping = 0;

        $data = [
            'reservations'   => $reservations,
            'subTotal'       => $reservations_sub_total,
            'shippingAmount' => $shipping,
            'total'          => $reservations_sub_total + $shipping
        ];

        return responseSuccess($data, 'data returned successfully');
    }

    public function reservation_service(reservationServiceRequest $request)
    {
        $data = $request->only('service_id', 'reservation_date', 'price_slot', 'quantity');
        unset($data['addons']);
        $data['user_id'] = auth('api')->user()->id;

        $reservation_date = date('Y-m-d', strtotime($data['reservation_date']));
        $closeDate = Service_Close_Date::where('service_id', $request->service_id)
            ->whereDate('date_from', '<=', $reservation_date)
            ->whereDate('date_to', '>=', $reservation_date)
            ->first();
        if ($closeDate) {
            return responseFail('this service closed in this date.');
        }

        $reservation = Reservation::firstOrCreate($data);

        if ($request->addons) {
            $addons = convert_sync_addons_data(json_decode($request->addons));
            $reservation->reservation_addons()->sync($addons);
        }

        return response()->json([
            "status" => 200,
            "message" => 'Data saved Successfully',
            'data' => $reservation->setAppends([]) ?? []
        ], 200);
    }

    public function remove_reservation($reservation_id)
    {
        if ($reservation = Reservation::find($reservation_id)) {
            if (auth('api')->user()->id  == $reservation->user_id) {
                $reservation->delete();
                $reservation->reservation_addons()->detach();
                return responseSuccess([], 'data removed Successfully');
            } else {
                return responseFail('this reservation not belong to you !');
            }
        } else {
            return responseFail('there is no reservation with this id !');
        }
    }

    public function remove_reservation_addons(RemoveReservationAddonsRequest $request)
    {
        if ($reservation = Reservation::find($request->reservation_id)) {
            if (auth('api')->user()->id  == $reservation->user_id) {
                $data = ReservationAddon::where(['reservation_id' => $request->reservation_id, 'addons_id' => $request->addons_id])
                    ->delete();
                if ($data) {
                    return responseSuccess($data, 'addons removed Successfully');
                } else {
                    return responseFail('there is no addons with this id for this reservation  !');
                }
            } else {
                return responseFail('this reservation not belong to you !');
            }
        } else {
            return responseFail('there is no reservation with this id !');
        }
    }

    public function update_reservation($reservation_id, UpdateReservationRequest $request)
    {
        $inputs = $request->only('reservation_date', 'price_slot', 'quantity');
        if ($reservation = Reservation::find($reservation_id)) {
            if (auth('api')->user()->id  == $reservation->user_id) {
                $result = $reservation->update($inputs);
                if ($request->addons) {
                    $addons = convert_sync_addons_data(json_decode($request->addons));
                    $reservation->reservation_addons()->sync($addons);
                }
                if ($result) {
                    return $this->get_reservations_list();
                }
            } else {
                return responseFail('this reservation not belong to you !');
            }
        } else {
            return responseFail('there is no reservation with this id !');
        }
    }
}