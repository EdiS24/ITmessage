<?php

namespace App\Http\Controllers;

use App\Models\Date;
use App\Http\Requests\DateEmp;

class DateController extends Controller
{
   
    public function index()
    {
     
        return view('admin.date')->with('dates', Date::all());
        flash()->success('Success', __('Date has been created successfully !'));

    }


    public function store(DateEmp $request)
    {
        //dd($request->date);
        if($request->input('date'))
        {
            $request['date'] = date("Y-m-d", strtotime($request['date']));
        }
        $request->validated();

        $date = new date;
        $date->slug = $request->input('slug');
        //dd($request->input('date'), $request->input('cdate'));
        $date->date = $request->input('date');
        $date->save();




        flash()->success('Success', __('Date has been created successfully !'));
        return redirect()->route('date.index');

    }

    public function update(DateEmp $request, Date $date)
    {
        if($request->input('date'))
        {
            $request['date'] = date("Y-m-d", strtotime($request['date']));
        }
        $request->validated();

        $date->slug = $request->input('slug');
        $date->date = $request->input('date');
        $date->save();
        flash()->success('Success', __('Date has been Updated successfully !'));
        return redirect()->route('date.index');
    }

  
    public function destroy(Date $date)
    {
        $date->delete();
        flash()->success('Success', __('Date has been deleted successfully !'));
        return redirect()->route('date.index');
    }
}