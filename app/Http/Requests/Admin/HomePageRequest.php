<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class HomePageRequest extends FormRequest
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
           'home_video' => ['mimetypes:video/mp4,video/mpeg,video/quicktime'],
           'home_overview_image' => ['image'],
           'home_overview_text' => ['min:5'],
           'home_overview_img2' => ['image'],
           'home_location_imgs.*' => ['image'],
           'location_title' => ['min:2'],
        ];
    }
}