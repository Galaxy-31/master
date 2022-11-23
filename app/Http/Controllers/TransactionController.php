<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\TransactionExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Requests\TransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }
    
    public function export_excel(Request $request)
    {
        return Excel::download(new TransactionExport, 'Laporan Profit Loss.xlsx');
    }

    public function data(Request $request)
    {
        $transactions = Transaction::latest()->get();
        if ($request->ajax()) {
            return datatables()
                ->of($transactions)
                ->addIndexColumn()
                ->addColumn('action', function($transactions){
                    return '
                    <a href="/transactions/'. $transactions->id .'/edit" class="edit btn btn-success btn-sm">Edit</a> 
                        <button class="delete btn btn-danger btn-sm" data-remote="/transactions/'. $transactions->id .'">Delete</button>
                    ';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $charts = Chart::all(); 
        $transactions = Transaction::all(); 
        return view('transactions.create', compact('transactions', 'charts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $transaction = Transaction::create($request->validated());

        if($transaction) {
            toast('Created Successfully!','success');
        }else {
            toast('Failed To Create!','error');
        }

        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        $chart = Chart::all();
        return view('transactions.edit',compact('transaction', 'chart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $transaction->update($request->validated());

        if($transaction) {
            toast('Data Has Changed!','info');
        }else {
            toast('Failed To Change!','error');
        }

        return redirect()->route('transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        if($transaction) {
            toast('Deleted Successfully!','success');
        }else {
            toast('Failed To Delete!','error');
        }

        return redirect()->route('transactions.index');
    }
}