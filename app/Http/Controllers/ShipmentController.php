<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shipment\CreateShipmentRequest;
use App\Models\Shipment;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class ShipmentController extends Controller
{
    public function createShipment(CreateShipmentRequest $request)
    {
        $client = new Client();
        $response = $client->post(env('BITESHIP_API_URL') . '/v1/orders', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('BITESHIP_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'shipper_contact_name' => $request->shipper_contact_name,
                'shipper_contact_phone' => $request->shipper_contact_phone,
                'shipper_contact_email' => $request->shipper_contact_email,
                'shipper_organization' => $request->shipper_organization,
                'origin_contact_name' => $request->origin_contact_name,
                'origin_contact_phone' => $request->origin_contact_phone,
                'origin_address' => $request->origin_address,
                'origin_note' => $request->origin_note,
                'origin_postal_code' => $request->origin_postal_code,
                'origin_coordinate' => $request->origin_coordinate,
                'origin_coordinate.latitude' => 'nullable|numeric',
                'origin_coordinate.longitude' => 'nullable|numeric',
                'destination_contact_name' => $request->destination_contact_name,
                'destination_contact_phone' => $request->destination_contact_phone,
                'destination_contact_email' => $request->destination_contact_email,
                'destination_address' => $request->destination_address,
                'destination_note' => $request->destination_note,
                'destination_postal_code' => $request->destination_postal_code,
                'destination_coordinate' => $request->destination_coordinate,
                'destination_coordinate.latitude' => 'nullable|numeric',
                'destination_coordinate.longitude' => 'nullable|numeric',
                'courier_company' => $request->courier_company,
                'courier_type' => $request->courier_type,
                'courier_insurance' => $request->courier_insurance,
                'delivery_type' => $request->delivery_type,
                'order_note' => $request->order_note,
                'items' => $request->items,
            ],
        ]);

        $biteshipResponse = json_decode($response->getBody(), true);
        $shipment = Shipment::create([
            'biteship_order_id' => $biteshipResponse['id'],
            'user_id' => auth()->id(),
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'shipment' => $shipment,
                'biteship_order_data' => $biteshipResponse,
            ],
        ]);
    }

    public function show($shipmentId)
    {
        $user = Auth::user();
        $client = new \GuzzleHttp\Client();
        $response = $client->get(env('BITESHIP_API_URL') . "/v1/orders/{$shipmentId}", [
            'headers' => [
                'Authorization' => 'Bearer ' . env('BITESHIP_API_KEY'),
            ],
        ]);
        $biteshipResponse = json_decode($response->getBody(), true);
        $trackingId = $biteshipResponse["courier"]["tracking_id"];

        $trackingRawResponse = $client->get(env('BITESHIP_API_URL') . "/v1/trackings/{$trackingId}", [
            'headers' => [
                'Authorization' => 'Bearer ' . env('BITESHIP_API_KEY'),
            ],
        ]);
        $trackingResponse = json_decode($trackingRawResponse->getBody(), true);
        return response()->json(["biteship_order_data" => $biteshipResponse, "tracking_data" => $trackingResponse, 'user_id' => $user->id]);
    }
}
