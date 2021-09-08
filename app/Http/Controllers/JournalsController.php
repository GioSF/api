<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;
use App\Http\Resources\JournalsResource;

class JournalsController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return JournalsResource::collection(Journal::all());
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
	public function store(Request $request, Journal $journal)
	{
		$journal = Journal::create($request->all());

		return new JournalsResource($journal);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function show(Journal $journal)
	{
		return new JournalsResource($journal);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Journal $journal)
	{
		return new JournalsResource($journal);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Journal $journal)
	{
		$journal->update($request->all());

		return new JournalsResource($journal);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Journal  $journal
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Journal $journal)
	{
		$journal->delete();
		return response(null, 204);
	}
}
