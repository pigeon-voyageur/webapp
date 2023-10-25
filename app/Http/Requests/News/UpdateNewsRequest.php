<?php

namespace App\Http\Requests\News;

use App\Models\NewsCategory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'news_category_id' => [
                'required',
                Rule::exists(NewsCategory::class, 'id'),
            ],
            'summary' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'sources' => 'required|array',
            'sources.*.label' => 'required|string',
            'sources.*.url' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'sources.*.label' => [
                'required' => 'Le champs est requis',
            ],
            'sources.*.url' => [
                'required' => 'Le champs est requis',
            ],
        ];
    }
}
