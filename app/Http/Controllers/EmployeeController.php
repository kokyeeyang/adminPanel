<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;

class EmployeeController extends Controller
{
    function index(){
        $employees = new Employee;
        $employeesData = $employees->selectAllEmployees();

        return view('users', [
            'employeesData' => $employeesData
        ]);
    }

    function view($id){
        $companies = DB::table('companies')
                    ->select('id', 'name')->get();
        $employeesData = Employee::find($id);

        return view('employee_details', [
            'companies' => $companies,
            'employeesData' => $employeesData
        ]);
    }

    function update($id, Request $request){
        $employee = Employee::findOrFail($id);
        $employee->update(
            [
                'first_name' => $request->input('first-name-input'),
                'last_name' => $request->input('last-name-input'),
                'phone_number' => $request->input('phone-number-input'),
                'email' => $request->input('email-input'),
                'company' => $request->input('company-input'),
                'updated_at' => date("Y-m-d h:i:s")
            ]
        );
        
        return redirect()->to('/viewAllEmployees');
    }

    function delete($id){
        $employee = Employee::findOrFail($id);
        $employee->delete();

        return redirect()->to('/viewAllEmployees');
    }

    function create(){
        $companies = DB::table('companies')
                    ->select('id', 'name')->get();

        return view('new_employee', [
            'companies' => $companies
        ]);
    }

    function save(Request $request){
        Employee::create(
            [
                'first_name' => $request->input('first-name-input'),
                'last_name' => $request->input('last-name-input'),
                'phone_number' => $request->input('phone-number-input'),
                'email' => $request->input('email-input'),
                'company' => $request->input('company-input')
            ]
        );

        return redirect()->to('/viewAllEmployees');
    }
    
}
