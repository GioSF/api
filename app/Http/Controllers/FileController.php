<?php

namespace App\Http\Controllers;

use App\Http\Resources\File as FileResource;
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
        $files = File::paginate(15);
        return FileResource::collection($files);
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
        $file = new File();
        $file->title = $request->input('title');
        $file->description = $request->input('description');
        $file->filepath = $request->input('filepath');
        $file->hash_name = $request->input('hash_name');

        if( $file->save() ){
          return new FileResource( $file );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::findOrFail( $id );
        return new FileResource( $file );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {
        $file = File::findOrFail( $request->id );
        $file->title = $request->input('title');
        $file->description = $request->input('description');
        $file->filepath = $request->input('filepath');
        $file->hash_name = $request->input('hash_name');

        if( $file->save() ){
          return new FileResource( $file );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::findOrFail( $id );
        if( $file->delete() ){
          return new FileResource( $file );
        }
      }
    }

