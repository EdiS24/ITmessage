<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Position;
use App\Http\Requests\EmployeeRec;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{

    public function index()
    {
        return view('admin.employee')->with(['employees' => Employee::all(), 'schedules' => Schedule::all(), 'schedule' => Schedule::first(), 'positions' => Position::all()]);
    }

    public function store(EmployeeRec $request)
    {
        $request->validated();

        $employee = new Employee;
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->birthday = $request->input('birthday');
        $employee->pin_code = bcrypt($request->input('pin_code'));
        $employee->save();

        if ($request->input('schedule')) {
            foreach ($request->input('schedule') as $sche) {
                $schedule = Schedule::whereSlug($sche)->first();

                $employee->schedules()->attach($schedule);
            }
        }
        if ($request->input('position')) {
            foreach ($request->input('position') as $sche) {
                $position = Position::whereSlug($sche)->first();

                $employee->positions()->attach($position);
            }
        }

        // $role = Role::whereSlug('emp')->first();

        // $employee->roles()->attach($role);

        flash()->create('Success', __('Member Record has been created successfully !'), 'success');

        return redirect()->route('employees.index')->with('success');
    }


    public function update(EmployeeRec $request, Employee $employee)
    {
        $request->validated();

        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->birthday = $request->input('birthday');
        $employee->pin_code = bcrypt($request->input('pin_code'));
        $employee->save();

        if ($request->input('schedule')) {
            $employee->schedules()->detach();
            foreach ($request->input('schedule') as $sche) {
                $schedule = Schedule::whereSlug($sche)->first();

                $employee->schedules()->attach($schedule);
            }
        }
        if ($request->input('position')) {
            $employee->positions()->detach();
            foreach ($request->input('position') as $pos) {
                $position = Position::whereSlug($pos)->first();

                $employee->positions()->attach($position);
            }
        }

        flash()->success('Success', __('Member Record has been updated successfully !'));

        return redirect()->route('employees.index')->with('success');
    }


    public function destroy(Employee $employee)
    {
        $employee->delete();
        flash()->create('Success', __('Member Record has been deleted successfully !'), 'success');
        return redirect()->route('employees.index')->with('success');
    }

    public function mail(Employee $employee, Request $request)
    {
        $notification = new Schedule;
        $notification->slug = $request->input('');
        $notification->message = $request->input('message');
        Mail::to($employee->email)->send(new SendMail($notification, $employee));
        return redirect()->route('employees.index');
    }
}
