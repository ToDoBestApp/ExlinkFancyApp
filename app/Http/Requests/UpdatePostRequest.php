<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

final class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'            => 'email|required|max:50',
            'name'             => 'string|required|max:50',
            'surname'          => 'string|required|max:50',
            'address'          => 'string|max:250',
            'phone_number'     => 'string|max:20|regex:/^([0-9\-\+\(\)]*)$/'
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge(['name_surname' => $this->name . ' ' . $this->surname]);
    }
}
