<?php

namespace App\Http\Requests\Shipment;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class CreateShipmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'shipper_contact_name' => 'required|string',
            'shipper_contact_phone' => 'required|string',
            'shipper_contact_email' => 'required|email',
            'shipper_organization' => 'nullable|string',
            'origin_contact_name' => 'required|string',
            'origin_contact_phone' => 'required|string',
            'origin_address' => 'required|string',
            'origin_note' => 'nullable|string',
            'origin_postal_code' => 'required|numeric|digits:5',
            'origin_coordinate' => 'nullable|array',
            'origin_coordinate.latitude' => 'nullable|numeric',
            'origin_coordinate.longitude' => 'nullable|numeric',
            'destination_contact_name' => 'required|string',
            'destination_contact_phone' => 'required|string',
            'destination_contact_email' => 'nullable|email',
            'destination_address' => 'required|string',
            'destination_note' => 'nullable|string',
            'destination_postal_code' => 'required|numeric|digits:5',
            'destination_coordinate' => 'nullable|array',
            'destination_coordinate.latitude' => 'nullable|numeric',
            'destination_coordinate.longitude' => 'nullable|numeric',
            'courier_company' => 'required|string',
            'courier_type' => 'required|string',
            'courier_insurance' => 'nullable|numeric',
            'delivery_type' => 'required|string',
            'order_note' => 'nullable|string',
            'items' => 'required|array',
            'items.*.name' => 'required|string',
            'items.*.description' => 'nullable|string',
            'items.*.category' => 'nullable|string',
            'items.*.value' => 'required|numeric',
            'items.*.quantity' => 'required|integer',
            'items.*.length' => 'nullable|numeric',
            'items.*.width' => 'nullable|numeric',
            'items.*.height' => 'nullable|numeric',
            'items.*.weight' => 'required|numeric',
        ];
    }

    public function failedValidationUserAction(Validator $validator)
    {
        Log::info('Validation failed', $validator->errors()->toArray());
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
