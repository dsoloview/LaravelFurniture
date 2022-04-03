<?php

namespace App\Http\Requests;

use App\Models\CarBody;
use App\Models\furnitureManufacture;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FurnitureApiRequest extends FormRequest
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
        $manufactureIds = FurnitureManufacture::all()->pluck('id')->toArray();
        return [
            'name' => "required|string",
            'body' => "required|string",
            'price' => "required|integer",
            'old_price'=> "required|integer",
            'furniture_manufacture_id'=> ["required", "integer", Rule::in($manufactureIds)],
        ];
    }
}
