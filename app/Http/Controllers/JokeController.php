<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;

class JokeController extends Controller
{
    public function index () 
    {
        $jokes = Joke::with('ratings')->withAvg('ratings', 'rate')->get();
        return view('welcome')->with('jokes', $jokes);
    }
}
