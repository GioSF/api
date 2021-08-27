<?php

namespace App\Http\Controllers;

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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('systemFunction.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SystemFunction::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return redirect()->route('systemFunction.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $systemFunction = SystemFunction::all();
        return view('systemFunction.show', ['systemFunction' => $systemFunction]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $systemFunction = SystemFunction::findOrFail($id);
        return view('systemFunction.edit', ['systemFunction' => $systemFunction]);
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
        $systemFunction = SystemFunction::findOrFail($id);
        $systemFunction->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $systemFunction = SystemFunction::findOrFail($id);
        $systemFunction->delete();
        return redirect()->route('systemFunction.create');
    }
}
