<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return response()->json(['clients' => $clients], 200);
    }

    public function getCars($clientId)
    {
        $client = Client::with(['cars', 'cars.services' => function ($query) use ($clientId) {
            $query->where('client_id', $clientId)
                  ->orderBy('lognumber', 'desc');
        }])->find($clientId);

        if (is_null($client)) {
            return response()->json(['message' => 'Ügyfél nem található'], 404);
        } else {
            return response()->json(['cars' => $client], 200);
        }
    }

}
