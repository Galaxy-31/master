<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::all();
        return view('transaksis.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksis.create');
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
            'date' => 'required',
            'code' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'debit' => 'required',
            'credit' => 'required',
        ]);

        Transaksi::create($request->all());

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return view('transaksis.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        $request->validate([
            'date' => 'required',
            'code' => 'required',
            'name' => 'required',
            'desc' => 'required',
            'debit' => '',
            'credit' => '',
        ]);

        $transaksi->update($request->all());

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()
            ->route('transaksis.index')
            ->with('success', 'Transaksi deleted successfully.');
    }

    public function data(Request $request)
    {
        $transaksis = Transaksi::latest()->get();
        if ($request->ajax()) {
            return datatables()
                ->of($transaksis)
                ->addIndexColumn()
                ->addColumn('action', function($transaksis){
                    return '
                        <a href="/transaksis/'. $transaksis->id .'/edit" class="edit btn btn-success btn-sm">Edit</a> 
                        <button class="delete btn btn-danger btn-sm" data-remote="/transaksis/'. $transaksis->id .'">Delete</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
