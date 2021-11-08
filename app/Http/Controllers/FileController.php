<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFileRequest;
use App\Http\Resources\FileResource;
use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
        return FileResource::collection(File::all());
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
	 * @param  \App\Http\Requests\StoreUpdateFileRequest  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(StoreUpdateFileRequest $request, File $file)
	{
		$file->create($request->all());

		return new FileResource( $file );
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show(File $file)
	{
		return new FileResource( $file );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function edit(File $file)
	{
		return new FileResource($file);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \App\Http\Requests\StoreUpdateFileRequest  $request
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function update(StoreUpdateFileRequest $request, File $file)
	{
		$file->update($request->all());

		return new FileResource($file);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\File  $file
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(File $file)
	{
		if ($file->delete()){
		return new FileResource( $file );
		}
	}
}

