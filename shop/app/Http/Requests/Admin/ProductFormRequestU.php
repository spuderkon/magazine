<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Product;

class ProductFormRequestU extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth("admin")->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Name' => 'required',
            'Category_id' => 'required|numeric',
            'Manufacturer_id' => 'required|numeric',
            'Brand_id' => 'required|numeric',
            'Price' => 'required|numeric|gt:0',
            'Age_audience_id' => 'required|numeric',
            'Weight' => 'nullable|gt:0',
            'Size' => 'nullable',
            'Material_id' => '',
            'Packing_size' => 'nullable',
            'Details_amount' => 'nullable',
            'Description' => 'required|string',
            'VenCode' => 'required',

        ];
    }
}
