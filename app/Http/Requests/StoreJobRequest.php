<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use \App\Models\Job;

class StoreJobRequest extends FormRequest
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
            "title" => "required|min:10|string|max:255",
            'location' => "required|string|max:255",
            'salary' => "required|numeric|max:1000000|min:5000",
            'description' => "required|string",
            "experience" => "required|in:" . implode(",", Job::$experience),
            "category" => "required|in:" . implode(",", Job::$category)
        ];
    }
}
