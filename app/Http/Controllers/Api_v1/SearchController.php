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

        $client = new GoogleSearchResults("309d8c8f44e424a99b1a6320b4bec5bb8d0401779d1a64137f73275eeba48128");
        $query = ["q" => $name,"location"=>"Armenia,Yerevan"];
        $response = $client->get_json($query);
        $result =  $response->organic_results;
        //organic_results
        $itemDataList = [];

        foreach ($result as $itemElement){

              $link=  $itemElement->link;
              $title = $itemElement->title;

            $itemDataList[] = [ 'link'=> $link, 'title'=> $title ];

        }

        return response()->json($itemDataList);

    }


    }
