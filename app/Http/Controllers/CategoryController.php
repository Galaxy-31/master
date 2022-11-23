<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categorys = Category::all();
        return view('categorys.index', compact('categorys'));
    }

    public function data(Request $request)
    {
        $categorys = Category::latest()->get();
        if ($request->ajax()) {
            return datatables()
                ->of($categorys)
                ->addIndexColumn()
                ->addColumn('action', function($categorys){
                    return '
                    <a href="/categorys/'. $categorys->id .'/edit" class="edit btn btn-success btn-sm">Edit</a> 
                        <button class="delete btn btn-danger btn-sm" data-remote="/categorys/'. $categorys->id .'">Delete</button>
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
        $categorys = Category::all(); 
        return view('Categorys.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        if($category) {
            toast('Created Successfully!','success');
        }else {
            toast('Failed To Create!','error');
        }

        return redirect()->route('categorys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categorys.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        if($category) {
            toast('Data Has Changed!','info');
        }else {
            toast('Failed To Change!','error');
        }

        return redirect()->route('categorys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        if($category) {
            toast('Deleted Successfully!','success');
        }else {
            toast('Failed To Delete!','error');
        }

        return redirect()->route('categorys.index');
    }
}