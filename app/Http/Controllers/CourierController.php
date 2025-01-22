<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    public function getCouriers()
    {
        $client = new Client();
        $response = $client->get(env('BITESHIP_API_URL') . '/v1/couriers', [
            'headers' => [
                'Authorization' => 'Bearer ' . env('BITESHIP_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);
        $biteshipResponse = json_decode($response->getBody(), true);
        return response()->json([
            'success' => true,
            'data' => collect($biteshipResponse["couriers"])->groupBy('courier_code'),
        ]);
    }
}
