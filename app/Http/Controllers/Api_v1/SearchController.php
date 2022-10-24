<?php

namespace App\Http\Controllers\Api_v1;

use App\Http\Controllers\Controller;
use GoogleSearch;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search_google(Request $request){
        $name = $request->search;

        $client = new GoogleSearch("03259611cd7bf7683223d8059056e881efcea5acb5f1371fda499c0e71b7d4b5");
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
