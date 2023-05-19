<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{

    public function getServices($clientId, $carId)
    {
        $services = Service::where('client_id', $clientId)
            ->where('car_id', $carId)
            ->get();

        if (is_null($services)) {
            return response()->json(['message' => 'Ügyfél nem található'], 404);
        } else {
            return response()->json(['services' => $services], 200);
        }
    }
}
