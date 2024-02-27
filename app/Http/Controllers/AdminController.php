<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Employee;
use App\Models\Schedule;
use App\Models\Position;
use App\Models\Date;

class AdminController extends Controller
{

 
    public function index()
    {
        //Dashboard statistics 
        $totalEmp =  count(Employee::all());
        $totalPosition = count(Position::all());
        $totalDate = count(Date::all());
        $totalSchedule =  count(Schedule::all());
        
        $data = [$totalEmp, $totalPosition, $totalDate, $totalSchedule];
        
        return view('admin.index')->with(['data' => $data]);
    }

}
