<?php

namespace App\Http\Controllers;

use App\Models\Fonds;
use Illuminate\Http\Request;
use App\Http\Resources\FondsResource;

class FondsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return FondsResource::collection(Fonds::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Fonds $fonds)
    {
        $fond = $fond->create($request->all());
		
		return new FondsResource($fond);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fonds  $fonds
     * @return \Illuminate\Http\Response
     */
    public function show(Fonds $fond)
    {
        return new FondsResource($fond);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fonds  $fonds
     * @return \Illuminate\Http\Response
     */
    public function edit(Fonds $fond)
    {
        return new FondsResource($fond);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fonds  $fonds
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fonds $fond)
    {
        $fond->update($request->all());

		return new FondsResource($fond);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fonds  $fonds
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fonds $fond)
    {
        $fond->delete();
		return response(null, 204);
    }
}
