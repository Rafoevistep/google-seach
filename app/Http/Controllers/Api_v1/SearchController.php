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

        $client = new GoogleSearchResults('dc86fb9fef9e738dbed8c4a26b25f4a6101f9940b4f61698954b12ac16cbb5d7');
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
