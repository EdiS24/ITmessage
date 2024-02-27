<?php

namespace App\Http\Controllers;

use App\Models\Position;
use App\Http\Requests\PositionEmp;

class PositionController extends Controller
{
   
    public function index()
    {
     
        return view('admin.position')->with('positions', Position::all());
        flash()->success('Success', __('Group has been created successfully !'));

    }


    public function store(PositionEmp $request)
    {
        //dd($request->date);
        $request->validated();

        $position = new position;
        $position->slug = $request->input('slug');
        //dd($request->input('date'), $request->input('cdate'));
        $position->save();

        flash()->success('Success', __('Group has been created successfully !'));
        return redirect()->route('position.index');

    }

    public function update(PositionEmp $request, Position $position)
    {
        $request->validated();

        $position->slug = $request->input('slug');
        $position->save();
        flash()->success('Success', __('Group has been updated successfully !'));
        return redirect()->route('position.index');
    }

  
    public function destroy(Position $position)
    {
        $position->delete();
        flash()->success('Success', __('Group has been deleted successfully !'));
        return redirect()->route('position.index');
    }
}