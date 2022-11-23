<?php

namespace App\Http\Controllers;

use App\Models\Chart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\ChartRequest;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $charts = Chart::all();
        return view('charts.index', compact('charts'));
    }

    public function data(Request $request)
    {
        $charts = Chart::latest()->get();
        if ($request->ajax()) {
            return datatables()
                ->of($charts)
                ->addIndexColumn()
                ->addColumn('action', function($charts){
                    return '
                    <a href="/charts/'. $charts->id .'/edit" class="edit btn btn-success btn-sm">Edit</a> 
                        <button class="delete btn btn-danger btn-sm" data-remote="/charts/'. $charts->id .'">Delete</button>
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
        $categorys = Category::all(); 
        return view('charts.create', compact('charts', 'categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartRequest $request)
    {
        $chart = Chart::create($request->validated());

        if($chart) {
            toast('Created Successfully!','success');
        }else {
            toast('Failed To Create!','error');
        }

        return redirect()->route('charts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function show(Chart $chart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chart  $chart
     * @return \Illuminate\Http\Response
     */
    public function edit(Chart $chart)
    {
        $categorys = Category::all(); 
        return view('charts.edit',compact('chart', 'categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chart  $Chart
     * @return \Illuminate\Http\Response
     */
    public function update(ChartRequest $request, Chart $chart)
    {
        $chart->update($request->validated());

        if($chart) {
            toast('Data Has Changed!','info');
        }else {
            toast('Failed To Change!','error');
        }

        return redirect()->route('charts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chart  $Chart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chart $chart)
    {
        $chart->delete();

        if($chart) {
            toast('Deleted Successfully!','success');
        }else {
            toast('Failed To Delete!','error');
        }

        return redirect()->route('charts.index');
    }
}