<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookFakeResponse extends Controller
{
    /**
     * Handle the incoming request.
     */

    public function __invoke(Request $request)
    {
        return response([
                "data" =>
                    [
                        [
                            "clicks" => rand(1, 100),
                            "spend" => rand(1, 1000),
                            "date_start" => "2024-06-21",
                            "date_stop" => "2024-06-24"
                        ]
                    ],
                "paging" =>
                    [
                        "cursors" =>
                            [
                                "before" => "MAZDZD",
                                "after" => "MAZDZD"
                            ]
                    ]
            ]);
    }
}
