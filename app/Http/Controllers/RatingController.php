<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add (Request $request) 
    {
        $request->validate([
            'joke_id' => 'required',
            'rate' => 'required',
        ]);  

        Rating::create(
            [
                'joke_id' => $request->get('joke_id'),
                'rate' => $request->get('rate')
            ]
        );

        return redirect()->back();
    }
}
