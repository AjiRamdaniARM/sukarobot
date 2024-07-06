<?php

namespace App\Http\Controllers;

use App\Exports\ParticipantExport;
use App\Models\Participant;
use App\Models\Race;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $race)
    {
        $cont = Race::findOrFail($race);
        $participants = Participant::with(['race', 'invoice'])->where('race_id', $race);

        if ($request->ajax()) {
            return DataTables::eloquent($participants)
                ->addColumn('invoice', function(Participant $participant){
                    return $participant->invoice->name;
                })
                ->addIndexColumn()
                ->toJson();
        }

        return view('dashboard.race.participant.index', compact('cont'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $race = Race::with(['participants'])->findOrFail($id);

        return Excel::download(new ParticipantExport($race->id), $race->slug.'.xlsx');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
