<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateContributionRequest;
use App\Http\Resources\ContributionsResource;
use App\Models\Contribution;
use Illuminate\Http\Request;

class ContributionController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return ContributionsResource::collection(Contribution::all());
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
	public function store(StoreUpdateContributionRequest $request, Contribution $contribution)
	{
		$contribution = $contribution->create($request->all());

		return new ContributionsResource($contribution);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Contributions $contribution)
	{
		return new ContributionsResource($contribution);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Contribution $contribution)
	{
		return new ContributionsResource($contribution);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreUpdateContributionRequest $request, Contribution $contribution)
	{
		$contribution->update($request->all());

		return new ContributionsResource($contribution);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Contribution $contribution)
	{
		$contribution->delete();
		return response(null, 204);
	}
}
