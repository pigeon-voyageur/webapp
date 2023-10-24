<?php

namespace App\Http\Requests\Pigeon;

use Illuminate\Foundation\Http\FormRequest;

class GetNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (!$user = auth()->user()) {
            return false;
        }

        return !$user->pigeon->isTravelling();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
        ];
    }
}
