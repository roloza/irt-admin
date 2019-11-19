<?php

namespace App\Http\Controllers\API;

use App\Count;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiCountController extends Controller
{
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
        $count = Count::create($request->all());
        $count->brands()->sync($request->brandId);

        return response()->json(['success' => 'Ajout effectué avec succès']);
    }

    public function index()
    {
        $counts = Count::latest()->get();
        return response()->json($counts);
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
            'id'            => 'required',
            'title'         => 'required',
            'slug'          => 'required',
            'value'         => 'required',
            'is_primary'    => 'required',
            'position'      => 'required',
            'status'        => 'required'
        ]);
        $count = Count::find($request->id);
        $count->title = $request->title;
        $count->slug = $request->slug;
        $count->value = $request->value;
        $count->is_primary = $request->is_primary;
        $count->position = $request->position;
        $count->status = $request->status;
        
        dd($count->save());
  
        return response()->json(['success' => 'Edition effectué avec succès']);
    }
}
