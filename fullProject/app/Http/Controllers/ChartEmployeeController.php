<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class ChartEmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('inventories.rents')->get();

        return view("chart-employee",compact('employees'));
    }
}
