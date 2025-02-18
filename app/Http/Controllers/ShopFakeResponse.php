<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopFakeResponse extends Controller
{
    /**
     * Handle the incoming request.
     */

    private function getRow() {
        return [
            "price_brutto" =>  rand(1, 10000),
            "items" =>  rand(1, 100)
        ];
    }

    function getResponse()
    {
        $response = [];
        for ($i = 1; $i < 10; $i++) {
            $response[] = $this->getRow();
        }

        return $response;
    }
    public function __invoke(Request $request)
    {
        return response([
            "confirmed" =>  $this->getResponse(),
            "start" =>  "2024-05-06 00 => 00 => 00",
            "stop" =>  "2024-05-29 23 => 59 => 59"
        ]);
    }
}
