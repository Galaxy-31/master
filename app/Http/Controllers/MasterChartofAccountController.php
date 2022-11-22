<?php

namespace App\Http\Controllers;

use App\Models\MasterChartofAccount;
use Illuminate\Http\Request;

class MasterChartofAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterchartofaccounts = MasterChartofAccount::all();
        return view('masterchartofaccounts.index', compact('masterchartofaccounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterchartofaccounts.create');
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
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
        ]);

        MasterChartofAccount::create($request->all());

        return redirect()
            ->route('masterchartofaccounts.index')
            ->with('success', 'Master Chart of Account created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterChartofAccount  $masterChartofAccount
     * @return \Illuminate\Http\Response
     */
    public function show(MasterChartofAccount $masterChartofAccount)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  \App\Models\MasterChartofAccount  $masterChartofAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterChartofAccount $masterchartofaccount)
    {
        return view('masterchartofaccounts.edit', compact('masterchartofaccount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterChartofAccount  $masterChartofAccount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterChartofAccount $masterChartofAccount)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'category' => 'required',
        ]);

        $masterChartofAccount->update($request->all());

        return redirect()
            ->route('masterchartofaccounts.index')
            ->with('success', 'masterchartofaccount updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterChartofAccount  $masterChartofAccount
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterChartofAccount $masterChartofAccount)
    {
        $masterChartofAccount->delete();

        return redirect()
            ->route('masterchartofaccounts.index')
            ->with('success', 'Master Chart of Account deleted successfully.');
    }

    public function data(Request $request)
    {
        $masterchartofaccounts = MasterChartofAccount::latest()->get();
        if ($request->ajax()) {
            return datatables()
                ->of($masterchartofaccounts)
                ->addIndexColumn()
                ->addColumn('action', function($masterchartofaccounts){
                    return '
                        <a href="/masterchartofaccounts/'. $masterchartofaccounts->id .'/edit" class="edit btn btn-success btn-sm">Edit</a> 
                        <button class="delete btn btn-danger btn-sm" data-remote="/masterchartofaccounts/'. $masterchartofaccounts->id .'">Delete</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
