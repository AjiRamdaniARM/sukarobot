<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Race;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class RaceController extends Controller
{
    public function index(Request $request)
    {
        $races = Race::with(['category']);

        if ($request->ajax()) {
            return DataTables::eloquent($races)
                ->addIndexColumn()
                ->editColumn('price', function(Race $race){
                    return "Rp. " .  number_format($race->price,0,',','.');
                })
                ->editColumn('image', function(Race $race){
                    return '<a href="'.asset($race->image).'" target="_blank">See Image</a>';
                })
                ->editColumn('team', function (Race $race){
                    return $race->team == 1 ? 'true' : 'false';
                })
                ->addColumn('check', function(Race $race){
                    return '<input type="checkbox" id="raceSelect" name="raceSelect[]" class="raceSelect" value="'. $race->id .'" />';
                })
                ->rawColumns(['image', 'check'])
                ->toJson();
        }

        return view('dashboard.participant.race.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'races' => ['required', 'array', 'min:1']
        ]);

        $id = IdGenerator::generate(['table' => 'invoices', 'field' => 'name', 'length' => 10, 'prefix' =>'INV-']);
        try {
            DB::beginTransaction();
            $invoice = Invoice::create([
                'user_id' => auth()->id(),
                'name' => $id,
            ]); 

            $invoice->itemRace()->attach($request->races);

            DB::commit();

            alert()->success('Success', 'To make invoice, please paid it !!');
            return response()->json([
                'success' => true,
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();

            alert()->error('Failed', 'To make invoice, please try again !!');
            return response()->json([
                'error' => true,
            ]);
        }
    }
}
