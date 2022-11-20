<?php

namespace App\Http\Controllers;

use App\Models\MasterCategoryCOA;
use Illuminate\Http\Request;

class MasterCategoryCOAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mastercategorycoas = MasterCategoryCOA::all();
        return view('mastercategorycoas.index', compact('mastercategorycoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mastercategorycoas.create');
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
            'name' => 'required',
        ]);

        MasterCategoryCOA::create($request->all());

        return redirect()
            ->route('mastercategorycoas.index')
            ->with('success', 'Master Category COA created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MasterCategoryCOA  $masterCategoryCOA
     * @return \Illuminate\Http\Response
     */
    public function show(MasterCategoryCOA $masterCategoryCOA)
    {
        return view('mastercategorycoas.show', compact('mastercategorycoas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MasterCategoryCOA  $masterCategoryCOA
     * @return \Illuminate\Http\Response
     */
    public function edit(MasterCategoryCOA $masterCategoryCOA)
    {
        return view('mastercategorycoas.edit', compact('mastercategorycoas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MasterCategoryCOA  $masterCategoryCOA
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MasterCategoryCOA $masterCategoryCOA)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $masterCategoryCOA->update($request->all());

        return redirect()
            ->route('mastercategorycoas.index')
            ->with('success', 'Master Category COA updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MasterCategoryCOA  $masterCategoryCOA
     * @return \Illuminate\Http\Response
     */
    public function destroy(MasterCategoryCOA $masterCategoryCOA)
    {
        $masterCategoryCOA->delete();

        return redirect()
            ->route('mastercategorycoas.index')
            ->with('success', 'Master Category COA deleted successfully.');
    }
}
