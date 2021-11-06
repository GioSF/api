<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Resources\DocumentsResource;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		return DocumentsResource::collection(Document::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Document $document)
	{
		$document = $document->create($request->all());

		return new DocumentsResource($document);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(Document $document)
	{
		return new DocumentsResource($document);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Document $document)
	{
		$document->update($request->all());
		dd($document);

		return new DocumentsResource($document);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Document $document)
	{
		$document->delete();
		return response(null, 204);
	}
}
