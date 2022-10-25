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

        $client = new GoogleSearchResults("ce171e29ad376522fe180f6ed6b3bda7d33c6be7980ca2854b5731a20171a467");
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
