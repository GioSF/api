<?php

namespace App\Http\Controllers;

use App\Http\Resources\Card as CardResource;
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
		$cards = Card::paginate(15);
		return CardResource::collection($cards);
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
		$card = new Card();
		$card->subject = $request->input('subject');
		$card->date_issue = $request->input('date_issue');
		$card->duration_issue = $request->input('duration_issue');
		$card->abstract = $request->input('abstract');
		$card->comment = $request->input('comment');
		$card->issue = $request->input('issue');
		$card->journal_id = $request->input('journal_id');
		$card->organization_id = $request->input('organization_id');

		if( $card->save() ){
		return new CardResource( $card );
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Card $card)
	{
		return new CardResource($card);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Card $card)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Card $card)
	{
		$card->subject = $request->input('subject');
		$card->date_issue = $request->input('date_issue');
		$card->duration_issue = $request->input('duration_issue');
		$card->abstract = $request->input('abstract');
		$card->comment = $request->input('comment');
		$card->issue = $request->input('issue');
		$card->journal_id = $request->input('journal_id');
		$card->organization_id = $request->input('organization_id');

		if ($card->save())
		{
			return new CardResource( $card );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Card $card)
	{
		if ($card->delete())
		{
			return new CardResource( $card );
		}
	}
}

