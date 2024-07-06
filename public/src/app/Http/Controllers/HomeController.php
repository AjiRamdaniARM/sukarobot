<?php

namespace App\Http\Controllers;

use App\Models\ContactMe;
use App\Models\Directive;
use App\Models\Faq;
use App\Models\LocationEvent;
use App\Models\Organized;
use App\Models\Race;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {       
        return view('welcome');
    }

    public function show($slug)
    {
        $race = Race::where('slug', $slug)->firstOrFail();
        $con = ContactMe::first();
        
        return view('show', compact('race', 'con'));
    }
}
