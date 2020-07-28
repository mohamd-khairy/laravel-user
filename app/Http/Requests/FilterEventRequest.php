<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class FilterEventRequest extends FormRequest
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
            "category" => 'nullable|integer|max:50|in:1,2',
            "min_price" => 'required_with:max_price|integer|min:1',
            "max_price" => 'required_with:min_price|integer|gt:min_price',
            'capacity' => 'nullable|integer|min:1',
            "page" => 'integer|min:1',
            "page_size" => 'integer|min:1',
            "sortColumn" => 'nullable|string|in:price',
            "sortDirection" => 'string|in:asc,desc',
            'business_types'    => 'array',
            'business_types.*'   => 'required|integer|distinct|exists:business_type,id',
        ];
    }

    public function validationData()
    {
        if ($this->has('business_types') && is_string($this->business_types)) {
            $this->request->add([
                'business_types' => json_decode($this->business_types)
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