<?php

namespace App\Http\Controllers\Api_v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search_google(Request $request): JsonResponse
    {
        $search = $request->search;

        $body = [
            'q' => $search,
            'gl' => 'am',
            'hl' => 'hy',
            'autocorrect' => true
        ];

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://google.serper.dev/search',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array(
                'X-API-KEY:' .env("SERPER_API_KEY"),
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);
        $data = $data['organic'];
        $itemDataList = [];

        for ($k = 0; $k < count($data); $k++) {
            $title = $data[$k]['title'];
            $link = $data[$k]['link'];
            $itemDataList[] = ['link' => $link, 'title' => $title];
        }

        return response()->json($itemDataList);

    }
}
