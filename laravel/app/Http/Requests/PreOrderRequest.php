<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreOrderRequest extends FormRequest
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
            'pizzas' => 'required|array',
            'pizzas.*' => 'required|array',
            'pizzas.*.pizza_id' => 'required|integer|exists:pizzas,id',
            'pizzas.*.amount' => 'required|integer|min:1',
        ];
    }
}
