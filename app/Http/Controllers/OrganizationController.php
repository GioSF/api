<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateOrganizationRequest;
use App\Http\Resources\OrganizationsResource;
use App\Models\Organization;

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
	 * @param  \App\Http\Requests\StoreUpdateOrganizationRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreUpdateOrganizationRequest $request, Organization $organization)
	{
        $organization = $organization->create($request->all());

		return new OrganizationsResource($organization);
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
	 * @param  \App\Http\Requests\StoreUpdateOrganizationRequest  $request
	 * @param  \App\Models\Organization  $organization
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreUpdateOrganizationRequest $request, Organization $organization)
	{
		$organization->update($request->all());

		return new OrganizationsResource($organization);
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
