<?php

namespace App\Http\Controllers;

use App\Http\Resources\SystemFunction as SystemFunctionResource;
use App\Models\SystemFunction;
use Illuminate\Http\Request;

class SystemFunctionController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $system_functions = SystemFunction::paginate(15);
        return SystemFunctionResource::collection($system_functions);
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
        $system_function = new SystemFunction();
        $system_function->name = $request->input('name');
        $system_function->description = $request->input('description');

        if( $system_function->save() ){
          return new SystemFunctionResource( $system_function );
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
        $system_function = SystemFunction::findOrFail( $id );
        return new SystemFunctionResource( $system_function );
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
        $system_function = SystemFunction::findOrFail( $request->id );
        $system_function->name = $request->input('name');
        $system_function->description = $request->input('description');

        if( $system_function->save() ){
          return new SystemFunctionResource( $system_function );
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
        $system_function = SystemFunction::findOrFail( $id );
        if( $system_function->delete() ){
          return new SystemFunctionResource( $system_function );
        }
      }
    }

