<?php

namespace App\Http\Requests\V1\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'user_id' => ['required', 'integer', 'exists:users,id'],
            'timezone' => ['nullable', 'string'],
            'enabled' => ['nullable', 'boolean'],
            'detect_region' => ['nullable', 'boolean'],
            'calltracking' => ['nullable', 'boolean'],
            'leads_today' => ['required', 'integer'],
            'leads_total' => ['required', 'integer'],
        ];
    }
}
