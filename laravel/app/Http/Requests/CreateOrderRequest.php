<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'address' => 'required|string|min:1|max:255',
            'pizzas' => 'required|array',
            'pizzas.*' => 'required|array',
            'pizzas.*.pizza_id' => 'required|integer|exists:pizzas,id',
            'pizzas.*.amount' => 'required|integer|min:1',
        ];
    }
}
