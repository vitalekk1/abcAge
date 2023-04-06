<?php

namespace App\Http\Controllers;

use App\Http\Requests\Shipment\StoreRequest;

class ShipmentController extends BaseController
{
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->storeShip($data['date']);

        return redirect()->route('product.show', $data['date']);

    }
}
