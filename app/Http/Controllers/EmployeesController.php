<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Post;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    final public function index(): void {
        $employee = Employee::query()->find(1);
        dd($employee);
    }


}
