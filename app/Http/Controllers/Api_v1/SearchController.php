<?php

namespace App\Http\Controllers\Api_v1;

use App\Http\Controllers\Controller;
use GoogleSearchResults;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search_google(Request $request): \Illuminate\Http\JsonResponse
    {
        $name = $request->search;

        $client = new GoogleSearchResults("cc88f79b455e81ecac213bd45362e21cc7e393b6167e934ea8f441a336fa0d48");
        $query = ["q" => $name, "location" => "Armenia,Yerevan"];
        $response = $client->get_json($query);
        $result = $response->organic_results;
        //organic_results
        $itemDataList = [];

        foreach ($result as $itemElement) {

            $link = $itemElement->link;
            $title = $itemElement->title;

            $itemDataList[] = ['link' => $link, 'title' => $title];

        }

        return response()->json($itemDataList);

    }

}
