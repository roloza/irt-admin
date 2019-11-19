<?php

namespace App\Http\Controllers;

use App\Count;
use Illuminate\Http\Request;

class CountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = Count::latest()->paginate(50);
        return view('admin.count.index',compact('counts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.count.create');
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
            'title'         => 'required',
            'slug'          => 'required',
            'value'         => 'required',
            'is_primary'    => 'required',
            'position'      => 'required',
            'status'        => 'required'
        ]);
  
        Count::create($request->all());
   
        return redirect()->route('counts.index')
                        ->with('success','Count created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function show(Count $count)
    {
        return view('admin.count.show',compact('count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function edit(Count $count)
    {
        
        return view('admin.count.edit',compact('count'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Count $count)
    {
        $request->validate([
            'title'         => 'required',
            'slug'          => 'required',
            'value'         => 'required',
            'is_primary'    => 'required',
            'position'      => 'required',
            'status'        => 'required'
        ]);
  
        $count->update($request->all());
  
        return redirect()->route('counts.index')
                        ->with('success','Count updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Count  $count
     * @return \Illuminate\Http\Response
     */
    public function destroy(Count $count)
    {
        $count->delete();

        return redirect()->route('counts.index')
                        ->with('success','Count deleted successfully');
    }
}
