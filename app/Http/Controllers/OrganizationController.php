<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Http\Resources\OrganizationsResource;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return OrganizationsResource::collection(Organization::all());
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
	public function store(Request $request)
	{
		$organization = Organization::create([
			'slug' => $request->slug,
			'description' => $request->description,
			'google_maps_link' => $request->google_maps_link,
		]);

		return new OrganizationsResource($journal);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Organization  $organization
	 * @return \Illuminate\Http\Response
	 */
	public function show(Organization $organization)
	{
		return new OrganizationsResource($organization);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Organization  $organization
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Organization $organization)
	{
		return new OrganizationsResource($organization);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Organization  $organization
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Organization $organization)
	{
		$organization->fill($request->attributes);
		$organization->save();
		return new OrganizationsResource($journal);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Organization  $organization
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Organization $organization)
	{
		$organization->delete();
		return response(null, 204);
	}
}
