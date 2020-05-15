<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Spatie\Searchable\Search;

class SearchController extends Controller
{
    /**
     * search records in database and display  results
     * @param  Request $request [description]
     * @return view      [description]
     */
    public function index(Request $request)
    {
        $searchterm = $request->input('query');
 
        $searchResults = (new Search())
                            ->registerModel(Contact::class, ['first_name', 'last_name'])
                            ->perform($searchterm);

        return response()->json($searchResults);
    }
}
