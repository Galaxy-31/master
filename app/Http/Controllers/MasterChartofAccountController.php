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
        return view('masterchartofaccount.index', compact('masterchartofaccount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterchartofaccount.create');
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
        return view('masterchartofaccounts.show', compact('masterchartofaccounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *  
     * @param  \App\Models\MasterChartofAccount  $masterChartofAccount
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterChartofAccount $masterChartofAccount)
    {
        return view('masterchartofaccount.edit', compact('masterchartofaccount'));
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
            ->route('masterchartofaccount.index')
            ->with('success', 'Master Chart of Account deleted successfully.');
    }
}
