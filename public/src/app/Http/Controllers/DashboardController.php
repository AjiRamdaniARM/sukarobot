<?php

namespace App\Http\Controllers;

use App\Models\Participant;
use App\Models\Race;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $lv2 = User::with('roles')->role('participant')->count();
        $participants = Participant::all()->count();
        $races = Race::all()->count();
        return view('dashboard.index', compact('lv2', 'participants', 'races'));
    }
}
