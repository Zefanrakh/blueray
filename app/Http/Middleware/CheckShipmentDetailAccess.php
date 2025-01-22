<?php

namespace App\Http\Middleware;

use App\Models\Shipment;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckShipmentDetailAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        $shipmentId = $request->route('shipmentId');
        if ($user->role->value === 'admin') {
            return $next($request);
        }

        $shipment = Shipment::where('biteship_order_id', $shipmentId)->first();
        if (!$shipment || $shipment->user_id !== $user->id) {
            return response()->json(['error' => 'Unauthorized access'], 403);
        }

        return $next($request);
    }
}
