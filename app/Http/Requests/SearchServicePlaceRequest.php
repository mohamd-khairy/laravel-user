<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\App;

class SearchServicePlaceRequest extends FormRequest
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
            "page" => 'integer|min:1',
            "page_size" => 'integer|min:1',
            "sortColumn" => 'string|in:id,price',
            "sortDirection" => 'string|in:asc,desc',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();
        throw new HttpResponseException(response()->json(['errors' => $errors,], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));
    }
}
