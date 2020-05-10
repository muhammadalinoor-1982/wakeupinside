<?php

namespace App\Http\Controllers;

use App\crud222;
use Illuminate\Http\Request;

class Crud222Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List Page';
        $data['crud222s'] =crud222::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return view('crud222.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create Page';
        return view('crud222.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'status'=>'required',
        ]);
        crud222::create($request->except('_token'));
        session()->flash('message','User Created successfully');
        return redirect()->route('crud222.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\crud222  $crud222
     * @return \Illuminate\Http\Response
     */
    public function show(crud222 $crud222)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\crud222  $crud222
     * @return \Illuminate\Http\Response
     */
    public function edit(crud222 $crud222)
    {
        $data['title'] = 'Update Page';
        $data['crud222'] = $crud222;
        return view('crud222.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\crud222  $crud222
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud222 $crud222)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'status'=>'required',
        ]);
        $crud222->update($request->except('_token'));
        session()->flash('message','User Updated successfully');
        return redirect()->route('crud222.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crud222  $crud222
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud222 $crud222)
    {
        $crud222->delete();
        session()->flash('message','User Deleted successfully');
        return redirect()->route('crud222.index');
    }
}
