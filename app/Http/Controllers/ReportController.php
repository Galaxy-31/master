<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Requests\ReportRequest;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reports = Report::all();
        return view('Reports.index', compact('reports'));
    }

    public function data(Request $request)
    {
        $Reports = Report::latest()->get();
        if ($request->ajax()) {
            return datatables()
                ->of($Reports)
                ->addIndexColumn()
                ->addColumn('action', function($Reports){
                    return '
                    <a href="/Reports/'. $Reports->id .'/edit" class="edit btn btn-success btn-sm">Edit</a> 
                        <button class="delete btn btn-danger btn-sm" data-remote="/Reports/'. $Reports->id .'">Delete</button>
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
        $Reports = Report::all(); 
        return view('Reports.create', compact('Reports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReportRequest $request)
    {
        $Report = Report::create($request->validated());

        if($Report) {
            toast('Created Successfully!','success');
        }else {
            toast('Failed To Create!','error');
        }

        return redirect()->route('Reports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $Report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $Report)
    {
        return view('Reports.edit',compact('Report'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function update(ReportRequest $request, Report $Report)
    {
        $Report->update($request->validated());

        if($Report) {
            toast('Data Has Changed!','info');
        }else {
            toast('Failed To Change!','error');
        }

        return redirect()->route('Reports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $Report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $Report)
    {
        $Report->delete();

        if($Report) {
            toast('Deleted Successfully!','success');
        }else {
            toast('Failed To Delete!','error');
        }

        return redirect()->route('Reports.index');
    }
}