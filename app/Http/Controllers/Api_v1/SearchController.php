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
        $client = new GoogleSearchResults("521a720cd2fb4392f64911be1cbb46d51003d823071fccc209f58744623d0671");
        $query = ["q" => $name, "location" => "Armenia,Yerevan"];
        $response = $client->get_json($query);
        $result = $response->organic_results;
        //organic_results
        $itemDataList = [];
        
        for($k=0; $k < count($result); $k++) {
            $link = $result[$k]->title;
            $title = $result[$k]->link;
            $itemDataList[] = ['link' => $link, 'title' => $title];
        }

        return response()->json($itemDataList);
    }
}
