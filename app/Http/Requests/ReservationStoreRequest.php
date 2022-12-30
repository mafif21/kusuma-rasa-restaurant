<?php

namespace App\Http\Requests;

use App\Rules\DateRule;
use App\Rules\TimeRule;
use Illuminate\Foundation\Http\FormRequest;

class ReservationStoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "first_name" => ['required'],
            "last_name" => ['required'],
            "email" => ['required', 'email:dns'],
            "phone" => ['required', 'integer'],
            "res_date" => ['required', 'date', new DateRule, new TimeRule],
            "table_id" => ['required'],
            "guest_number" => ['required', 'integer'],
        ];
    }
}