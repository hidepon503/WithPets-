<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class AuthRequest extends FormRequest
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
            'owner_name' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'postcode' => ['required', 'numeric', 'digits:7'],
            'prefecture' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'street' => ['required', 'string', 'max:255'],
            'building' => ['required', 'string', 'max:255'],
            'other' => ['nullable', 'string', 'max:255'],
            'tel' => ['required', 'numeric', 'digits_between:10,11'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class ],
            // 'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class . ',email', 'unique:' . User::class . ',email_verified_at'],//email_verified_atはnullを許容するため、uniqueでエラーが出るため、//
            'password' => ['required', 'confirmed', 'min:8'],
            'owner_birthday' => ['nullable', 'date'],
            'image' => ['nullable', 'string', 'max:2048'],
            'owner_image' => ['nullable', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'introduction' => ['nullable', 'string', 'max:200'],
            'url' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'youtube' => ['nullable', 'url', 'max:255'],
            'line' => ['nullable', 'url', 'max:255'],
            'tiktok' => ['nullable', 'url', 'max:255'],
            'pinterest' => ['nullable', 'url', 'max:255']
        ];
    }
}
