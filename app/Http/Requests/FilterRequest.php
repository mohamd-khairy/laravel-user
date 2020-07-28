<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class FilterRequest extends FormRequest
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
        return [
            "category" => 'required|integer|max:50|in:1,2',
            "city" => 'string|max:50',
            "text" => 'string|max:50',
            'capacity' => 'nullable|integer|min:1',
            "package" => 'nullable|boolean',
            "offer" => 'nullable|boolean',
            "page" => 'integer|min:1',
            "page_size" => 'integer|min:1',
            "sortColumn" => 'string|in:id,price',
            "sortDirection" => 'string|in:asc,desc',
            'business_types'    => 'array',
            'business_types.*'   => 'required|integer|distinct|exists:business_type,id',
            'food_types'    => 'array',
            'food_types.*'   => 'required|integer|distinct',
            'fits_with'    => 'array',
            'fits_with.*'   => 'required|integer|distinct',
            'neighborhood'    => 'array',
            'neighborhood.*'   => 'required|string|distinct',
        ];
    }

    public function validationData()
    {
        if ($this->has('business_types') && is_string($this->business_types)) {
            $this->request->add([
                'business_types' => json_decode($this->business_types)
            ]);
        }
        if ($this->has('fits_with') && is_string($this->fits_with)) {
            $this->request->add([
                'fits_with' => json_decode($this->fits_with)
            ]);
        }
        if ($this->has('food_types') && is_string($this->food_types)) {
            $this->request->add([
                'food_types' => json_decode($this->food_types)
            ]);
        }
        if ($this->has('neighborhood') && is_string($this->neighborhood)) {
            $this->request->add([
                'neighborhood' => json_decode($this->neighborhood)
            ]);
        }
        return $this->request->all();
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
