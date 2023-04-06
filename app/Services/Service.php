<?php

namespace App\Services;

use App\Models\Shipment;
use App\Models\Supply;
use DateTime;

class Service
{
    public function storeShip($date)
    {
        $dateFrom = '2021-01-13';
        $datetimeFrom = DateTime::createFromFormat('Y-m-d', $dateFrom);
        $datetimeTo = DateTime::createFromFormat('Y-m-d', $date);

        $quantityDays = $datetimeFrom->diff($datetimeTo)->format('%a');

        Shipment::getQuery()->delete();

        for ($i = 0; $i < $quantityDays; $i++) {
            $supplies = Supply::where('product_id', 5)->get();

            foreach ($supplies as $supply) {
                $shippments_count = Shipment::where('supply_id', $supply['id'])->get()->sum('count');

                if (($supply['count'] - $shippments_count) >= $this->fib($i + 1)) {
                    Shipment::create([
                        'supply_id' => $supply['id'],
                        'count' => $this->fib($i + 1),
                        'date' => $datetimeFrom->modify('1 day')
                    ]);

                    break;
                }
            }
        }
    }

    public function fib($n)
    {
        if ($n == 0) return 0;
        if ($n == 1 || $n == 2) {
            return 1;
        } else {
            return $this->fib($n - 1) + $this->fib($n - 2);
        }
    }
}
