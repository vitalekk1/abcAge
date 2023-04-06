<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowRequest;
use App\Models\Shipment;
use App\Models\Supply;

class ShowPriceProduct extends Controller
{
    public function index($date = null)
    {
        $supplies = Supply::where('product_id', 5)->get();

        foreach ($supplies as $supply) {
            $supply['count_ship'] = Shipment::where('supply_id', $supply['id'])->get()->sum('count');
        }

        $price = 0;
        if (Shipment::where('date', $date)->count()) {
            $supply = Supply::where('id', Shipment::where('date', $date)->first()['supply_id'])->first();
            $price = $supply['price'] / $supply['count'];
        }

        return view('show', compact('supplies', 'date', 'price'));
    }
}
