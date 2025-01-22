<?php

namespace App\Http\Controllers;

use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function adminDashboard()
    {
        $totalOrders = Shipment::count();

        $statistics = User::query()
            ->select('users.id', 'users.name as user_name', 'users.email as user_email')
            ->leftJoin('shipments', 'users.id', '=', 'shipments.user_id')
            ->groupBy('users.id', 'users.name', 'users.email')
            ->selectRaw('COUNT(shipments.id) as order_count')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'total_orders' => $totalOrders,
                'statistics' => $statistics,
            ],
        ]);
    }

    public function userDashboard($userId)
    {
        $userOrders = Shipment::where('user_id', $userId)->get();

        return response()->json([
            'success' => true,
            'data' => $userOrders,
        ]);
    }
}
