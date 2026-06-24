<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DonateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'amount' => ['required', 'numeric', 'min:1', 'max:1000000'],
            'category' => ['required', 'string', Rule::in(config('site.donation_categories'))],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => __('site.donate.form.name'),
            'email' => __('site.donate.form.email'),
            'phone' => __('site.donate.form.phone'),
            'amount' => __('site.donate.form.amount'),
            'category' => __('site.donate.form.category'),
            'message' => __('site.donate.form.message'),
        ];
    }
}
