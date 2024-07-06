<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Race;
use App\Models\User;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Invoice::with('user');
    
        if ($request->ajax()) {
            return DataTables::eloquent($invoices)
                ->addIndexColumn()
                ->editColumn('status', function(Invoice $invoice){
                    if ($invoice->status == 'unpaid') {
                        return '<span class="badge badge-danger">'.$invoice->status.'</span>';
                    } elseif ($invoice->status == 'reject') {
                        return '<span class="badge badge-danger">'.$invoice->status.'</span>';
                    }elseif ($invoice->status == 'pending') {
                        return '<span class="badge badge-secondary">'.$invoice->status.'</span>';
                    }elseif ($invoice->status == 'paid') {
                        return '<span class="badge badge-success">'.$invoice->status.'</span>';
                    }
                    
                    return $invoice->status;
                })
                ->addColumn('races', function (Invoice $invoice) {
                    return $invoice->itemRace->map(function($item) {
                        return '<span class="badge badge-primary">'.$item->name.'</span>';
                    })->implode(' ');
                })
                ->addColumn('sum', function (Invoice $invoice) {
                    return '<span class="badge badge-success">Rp. '.number_format($invoice->itemRace()->sum('price'),0,',','.').'</span>';
                })
                ->editColumn('created_at', function(Invoice $invoice){
                    return $invoice->created_at->format('d-m-Y H:i');
                })
                ->addColumn('user', function(Invoice $invoice){
                    return $invoice->user->name;
                })
                ->addColumn('action', 'dashboard.invoice.action')
                ->rawColumns(['status', 'races', 'sum', 'action'])
                ->toJson();
        }
        return view('dashboard.invoice.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id', 'name')->get();
        $races = Race::select('id', 'name')->get();
        return view('dashboard.invoice.create', compact('users', 'races'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user' => ['required', 'string'],
            'races' => ['required', 'array', 'min:1']
        ]);

        $id = IdGenerator::generate(['table' => 'invoices', 'field' => 'name', 'length' => 10, 'prefix' =>'INV-']);
        try {
            DB::beginTransaction();
            $invoice = Invoice::create([
                'user_id' => $request->user,
                'name' => $id,
            ]); 

            $invoice->itemRace()->attach($request->races);

            DB::commit();

            alert()->success('Success', 'To make invoice, please paid it !!');
            return redirect()->route('invoice.index');
        } catch (\Throwable $th) {
            DB::rollBack();

            alert()->error('Failed', 'To make invoice, please try again !!');
            return redirect()->route('invoice.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inv = Invoice::findOrFail($id);

        return view('dashboard.invoice.show', compact('inv'));
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
        $request->validate([
            'status' => ['required', 'string'],
            'path' => ['nullable', 'string'],
        ]);

        $inv = Invoice::findOrFail($id);

        if(!File::isDirectory('images/payment')){
            File::makeDirectory('images/payment', 0777, true, true);
        }
        
        $path = $inv->image;
        if (!is_null($request->path)) {
            $path = 'images/payment/'.trim($request->path, '"');
            $old = public_path().'/tmp/uploads/'.trim($request->path, '"');
            $new = public_path().'/'.$path;
            File::move($old, $new);
            File::delete(public_path().'/'.$inv->image);
        }

        try {
            $inv->update([
                'status' => $request->status,
                'image' => $path,
            ]);

            alert()->success('Success', 'Update invoice');
            return redirect()->route('invoice.index');
        } catch (\Throwable $th) {
            alert()->error('Oops !!', 'Error update invoice');
            return redirect()->route('invoice.index');
        }
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
