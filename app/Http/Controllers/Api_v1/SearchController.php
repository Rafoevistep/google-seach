<?php

namespace App\Http\Controllers\Api_v1;

use App\Http\Controllers\Controller;
use GoogleSearch;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function search_google(Request $request){
        $name = $request->search;
        $search = "https://www.google.com/search?q=" . $name. "&rlz=1C5CHFA_enNZ948NZ948&oq=" .$name . "&aqs=chrome.0.69i59l2j46i175i199i433j46i199i291i433j46j0i433j0j69i60.875j0j9&sourceid=chrome&ie=UTF-8";
//        return redirect($search);

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
