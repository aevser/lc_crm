<?php

namespace App\Http\Requests\V1\Host;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHostRequest extends FormRequest
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
            'project_id' => ['required', 'exists:projects,id'],
            'url' => ['required', 'string', 'max:255'],
        ];
    }
}
