<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateContribuitionRequest;
use App\Http\Resources\ContribuitionsResource;
use App\Models\Contribuition;
use Illuminate\Http\Request;

class ContribuitionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return ContribuitionsResource::collection(Contribuition::all());
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
	public function store(StoreUpdateContribuitionRequest $request, Contribuition $contribuition)
	{
		$contribuition = $contribuition->create($request->all());

		return new ContribuitionsResource($contribuition);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Contribuition $contribuition)
	{
		return new ContribuitionsResource($contribuition);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Contribuition $contribuition)
	{
		return new ContribuitionsResource($contribuition);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreUpdateContribuitionRequest $request, Contribuition $contribuition)
	{
		$contribuition->update($request->all());

		return new ContribuitionsResource($contribuition);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Contribuition $contribuition)
	{
		$contribuition->delete();
		return response(null, 204);
	}
}
