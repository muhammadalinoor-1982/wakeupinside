<?php

namespace App\Http\Controllers;

use App\crud111;
use Carbon\Carbon;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $data['crud111s'] = Crud111::withTrashed()->orderBy('id','desc')->get();
        $data['serial'] = 1;
        return  view('crud111.index',$data);
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
            'status'=>'required',
            'user_type'=>'required',
            'image'=>'image|required'

        ]);
        $crud111 = $request->except('_token');
        $crud111['created_by'] = 1;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'L3T_'.$file->getClientOriginalName();
            $file->move('images/users/',$file_name);
            $crud111['image'] = 'images/users/'.$file_name;
        }
        Crud111::create($crud111);
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
            'status'=>'required',
            'user_type'=>'required',
            'image'=>'image|required'
        ]);
        $crud111_data = $request->except('_token','_method');
        $crud111_data['updated_by'] = 2;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $file_name = date('d.m.Y').'_'.time().'_'.rand(0000,9999).'_'.'L3T_'.$file->getClientOriginalName();
            $file->move('images/users/',$file_name);
            File::delete($crud111->image);
            $crud111_data['image'] = 'images/users/'.$file_name;
        }
        $crud111->update($crud111_data);
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
    public function restore($id)
    {
        $crud111 = crud111::onlyTrashed()->findOrFail($id);
        $crud111->restore();
        session()->flash('message','User restore successfully');
        return redirect()->route('crud111.index');
    }
    public function delete($id)
    {
        $crud111 = crud111::onlyTrashed()->findOrFail($id);
        File::delete($crud111->image);
        $crud111->forceDelete();
        session()->flash('message','User has been deleted permanently');
        return redirect()->route('crud111.index');
    }
}
