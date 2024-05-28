<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
  

    public function autocomplete(Request $request)
    {
        $data = [];

        if ($request->filled('q')) {
            $data = User::select("name", "id")
                ->where('name', 'LIKE', '%' . $request->get('q') . '%')
                ->get();
        }

        return response()->json($data);
    }

    public function searchResult(Request $request)
    {
        $user = User::find($request->id);
        return response()->json($user);
    }
}
