<?php

namespace App\Http\Controllers;

use App\Models\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchPhrase = $request->query('s');
        $languageId = app()->getLocaleId();

        $products = Search::get_search_products($searchPhrase, $languageId, 10);

        return view('search.index', compact('products'));
    }
}
