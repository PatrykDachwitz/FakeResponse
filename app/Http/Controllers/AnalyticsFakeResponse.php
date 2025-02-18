<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnalyticsFakeResponse extends Controller
{
    /**
     * Handle the incoming request.
     */


    public function getRow($date) {
        return [
            "dimensionValues" => [
                [
                    "value" => "{$date}"
                     ]
            ],
            "metricValues" => [
                [
                    "value" => rand(1, 9900)
                ]
            ]
        ];
    }

    function getFakeResponseLast50Day()
    {
        $date = date("Ymd");
        $fakeResponse[] = $this->getRow($date);

        for ($i = 1; $i < 50; $i++) {
            $date = date("Ymd", strtotime("-{$i} day"));
            $fakeResponse[] = $this->getRow($date);
        }

        return $fakeResponse;
    }

    public function getResponse() {
        return [
            "dimensionHeaders" => [
                [
                    "name" => "date"
                ]
            ],
            "metricHeaders" => [
                [
                    "name" => "activeUsers",
                    "type" => "TYPE_INTEGER"
                ]
            ],
            "rows" => $this->getFakeResponseLast50Day(),
            "rowCount" => 5,
            "metadata" => [
                "currencyCode" => "EUR",
                "timeZone" => "Europe/Warsaw"
            ],
            "kind" => "analyticsData#runReport"
        ];
    }
    public function __invoke(Request $request)
    {
        return response($this->getResponse());
    }
}
