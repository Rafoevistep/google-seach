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

        $client = new GoogleSearchResults("3d222a649b7b32500a66125389dfec3ec91814814ccc32f82c339e7709c9331c");
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
