<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GoogleFakeResponse extends Controller
{
    /**
     * Handle the incoming request.
     */

    private function getRow($idCompany, $date) {
        return [ "campaign" => [
            "resourceName" => "customers/{$idCompany}/campaigns/2312",
            "name" => "Test"
            ],
            "metrics" => [
                "clicks" => rand(1, 100000),
                "costMicros" => (rand(1, 90) * 100000),
            ],
            "segments" => [
                "date" => "{$date}"
            ]
        ];
    }

    function getFakeResponseLast50Day($id)
    {
        $date = date("Y-m-d");
        $fakeResponse[] = $this->getRow($id, $date);

        for ($i = 1; $i < 50; $i++) {
            $date = date("Y-m-d", strtotime("-{$i} day"));
            $fakeResponse[] = $this->getRow($id, $date);
        }

        return $fakeResponse;
    }

    public function __invoke(Request $request, $idCompany)
    {


        return response([
            'results' => $this->getFakeResponseLast50Day($idCompany)
        ]);
    }
}
