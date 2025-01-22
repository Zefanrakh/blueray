<?php

namespace Tests\Feature;

use App\Enums\UserRole;
use App\Http\Middleware\CheckShipmentDetailAccess;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Mockery;
use Tests\TestCase;

class ShipmentTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_shipment()
    {
        $user = User::factory()->create(['role' => UserRole::User]);
        $response = $this->actingAs($user)->postJson('/api/shipments', [
            'shipper_contact_name' => 'Amir',
            'shipper_contact_phone' => '088888888888',
            'shipper_contact_email' => 'biteship@test.com',
            'shipper_organization' => 'Biteship Org Test',
            'origin_contact_name' => 'Amir',
            'origin_contact_phone' => '088888888888',
            'origin_address' => 'Plaza Senayan, Jalan Asia Afrika...',
            'origin_note' => 'Dekat pintu masuk STC',
            'origin_postal_code' => 12440,
            'destination_contact_name' => 'John Doe',
            'destination_contact_phone' => '088888888888',
            'destination_contact_email' => 'jon@test.com',
            'destination_address' => 'Lebak Bulus MRT...',
            'destination_note' => 'Near the gas station',
            'destination_postal_code' => 12950,
            'courier_company' => 'jne',
            'courier_type' => 'reg',
            'courier_insurance' => 500000,
            'delivery_type' => 'now',
            'order_note' => 'Please be careful',
            'items' => [
                [
                    'name' => 'Black L',
                    'description' => 'White Shirt',
                    'category' => 'fashion',
                    'value' => 165000,
                    'quantity' => 1,
                    'length' => 10,
                    'width' => 10,
                    'height' => 10,
                    'weight' => 200,
                ],
            ],
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'data' => [
                'shipment' => [
                    'id',
                    'biteship_order_id',
                ]
            ],
        ]);
    }

    public function test_show()
    {
        $user = User::factory()->create(['role' => UserRole::User]);
        $response = $this->actingAs($user)->postJson('/api/shipments', [
            'shipper_contact_name' => 'Amir',
            'shipper_contact_phone' => '088888888888',
            'shipper_contact_email' => 'biteship@test.com',
            'shipper_organization' => 'Biteship Org Test',
            'origin_contact_name' => 'Amir',
            'origin_contact_phone' => '088888888888',
            'origin_address' => 'Plaza Senayan, Jalan Asia Afrika...',
            'origin_note' => 'Dekat pintu masuk STC',
            'origin_postal_code' => 12440,
            'destination_contact_name' => 'John Doe',
            'destination_contact_phone' => '088888888888',
            'destination_contact_email' => 'jon@test.com',
            'destination_address' => 'Lebak Bulus MRT...',
            'destination_note' => 'Near the gas station',
            'destination_postal_code' => 12950,
            'courier_company' => 'jne',
            'courier_type' => 'reg',
            'courier_insurance' => 500000,
            'delivery_type' => 'now',
            'order_note' => 'Please be careful',
            'items' => [
                [
                    'name' => 'Black L',
                    'description' => 'White Shirt',
                    'category' => 'fashion',
                    'value' => 165000,
                    'quantity' => 1,
                    'length' => 10,
                    'width' => 10,
                    'height' => 10,
                    'weight' => 200,
                ],
            ],
        ]);

        $response->assertStatus(200);
        $shipmentId = $response->json('data.shipment.biteship_order_id');

        $response = $this->json('GET', "/api/shipments/{$shipmentId}");

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'biteship_order_data',
            'tracking_data',
            'user_id'
        ]);
    }
}
