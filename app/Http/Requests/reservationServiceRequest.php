<?php

namespace App\Http\Requests;

use App\Models\Service;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class reservationServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->has('service_id') && Service::find($this->service_id) && Service::find($this->service_id)->main_category == 1) {

            return [
                "service_id" => 'required|integer|min:1|exists:services,id',
                "price_slot" => 'required|in:day,morning,evening',
                "reservation_date" => 'required|date|after:yesterday',
                'addons_value'     => 'array|required_with:addons',
                'addons_value.*'   => 'required|integer|min:1',
            ];
        } else {
            return [
                "service_id" => 'required|integer|min:1|exists:services,id',
                "quantity" => 'required|integer|min:1',
                "reservation_date" => 'required|date|after:yesterday',
                'addons_value'     => 'array|required_with:addons',
                'addons_value.*'   => 'required|integer|min:1',
            ];
        }
    }

    public function validationData()
    {
        if ($this->has('addons') && is_string($this->addons)) {
            $this->request->add([
                'addons_value' => array_values((array) json_decode($this->addons)),
            ]);
        }
        return $this->all();
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(
            ['errors' => $errors,],

            JsonResponse::HTTP_UNPROCESSABLE_ENTITY
        ));
    }
}