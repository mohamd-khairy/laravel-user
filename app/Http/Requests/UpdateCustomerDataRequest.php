<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class UpdateCustomerDataRequest extends FormRequest
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
            'job_title' => 'nullable|string',
            'personal_image' => 'image|mimes:jpeg,png,jpg|max:1024',
            'gender'    => 'nullable|string|in:male,female',
            'first_name'  => 'nullable|string',
            'middle_name'  => 'nullable|string',
            'last_name'  => 'nullable|string',
            'personal_phone' => 'nullable|string|min:10',
            'date_of_birth' => 'nullable|date|before:today',
        ];
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