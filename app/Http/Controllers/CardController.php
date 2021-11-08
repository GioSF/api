<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateCardRequest;
use App\Http\Resources\CardResource;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return CardResource::collection(Card::all());
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
	 * @param  \App\Http\Requests\StoreUpdateCardRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreUpdateCardRequest $request, Card $card)
	{
		$card = $card->create($request->all());

		return new CardResource($card);
		}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Card $card
	 * @return \Illuminate\Http\Response
	 */
	public function show(Card $card)
	{
		return new CardResource($card);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Card $card
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Card $card)
	{
		return new CardResource($card);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreUpdateCardRequest $request
	 * @param  \App\Models\Card $card
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreUpdateCardRequest $request, Card $card)
	{
		$card->update($request->all());

		return new CardResource($card);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Card $card
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Card $card)
	{
		$card->delete();
		return response(null, 204);
	}
}

