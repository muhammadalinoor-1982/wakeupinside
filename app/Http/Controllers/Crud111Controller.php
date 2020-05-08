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
        $data['title'] = 'List Page';
        $data['crud111s'] = Crud111::orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('crud111.list111',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Create New User';
        return  view('crud111.create',$data);
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
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'status'=>'required'
        ]);
        Crud111::create($request->except('_token'));
        session()->flash('message','User Created successfully');
        return redirect()->route('crud111.index');
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
        $data['title'] = 'Edit User';
        $data['crud111'] = $crud111;
        return  view('crud111.edit',$data);
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'address'=>'required',
            'gender'=>'required',
            'status'=>'required'
        ]);
        $crud111->update($request->except('_token'));
        session()->flash('message','User Updated successfully');
        return redirect()->route('crud111.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\crud111  $crud111
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud111 $crud111)
    {
        $crud111->delete();
        session()->flash('message','User Deleted successfully');
        return redirect()->route('crud111.index');
    }
}
