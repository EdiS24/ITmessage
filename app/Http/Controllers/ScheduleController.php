<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Date;
use App\Models\Position;
use App\Http\Requests\ScheduleEmp;
use App\Http\Controllers\EmployeeController;
use App\Models\Employee;
use App\Notifications\NotificationCreated;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;

class ScheduleController extends Controller
{

    public function index()
    {

        return view('admin.schedule')->with(['schedules' => Schedule::all(), 'dates' => Date::all(), 'positions' => Position::all()]);
        flash()->success('Success', __('Notification has been created successfully !'));
    }


    public function store(ScheduleEmp $request)
    {
        if ($request->input('date')) {
            $request['date'] = date("Y-m-d", strtotime($request['date']));
        }
        $request->validated();

        $schedule = new schedule;
        $schedule->slug = $request->slug;
        $schedule->message = $request->message;
        //dd($request->input('date'), $request->input('cdate'));
        if ($request->input('date')) {
            $schedule->date = $request->input('date');
        } else {
            $schedule->date = $request->input('cdate');
        }
        // if($request->input('position'))
        // {
        //     EmployeeController::update()
        //     {

        //     }
        // }
        $schedule->save();




        flash()->success('Success', __('Notification has been created successfully !'));
        return redirect()->route('schedule.index');
    }

    public function update(ScheduleEmp $request, Schedule $schedule)
    {
        if ($request->input('date')) {
            $request['date'] = date("Y-m-d", strtotime($request['date']));
        }
        $request->validated();

        $schedule->slug = $request->input('slug');
        $schedule->message = $request->input('message');
        if ($request->input('date')) {
            $schedule->date = $request->input('date');
        } else {
            $schedule->date = $request->input('cdate');
        }
        $schedule->save();
        flash()->success('Success', __('Notification has been Updated successfully !'));
        return redirect()->route('schedule.index');
    }


    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        flash()->success('Success', __('Notification has been deleted successfully !'));
        return redirect()->route('schedule.index');
    }
}
