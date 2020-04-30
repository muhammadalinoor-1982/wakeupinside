<?php

namespace App\Http\Controllers;

use App\crud111;
use Illuminate\Http\Request;

class Crud111Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('crud111.list111');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crud111  $crud111
     * @return \Illuminate\Http\Response
     */
    public function show(crud111 $crud111)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crud111  $crud111
     * @return \Illuminate\Http\Response
     */
    public function edit(crud111 $crud111)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crud111  $crud111
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud111 $crud111)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crud111  $crud111
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud111 $crud111)
    {
        //
    }
}
