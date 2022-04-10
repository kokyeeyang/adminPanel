<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class CompanyController extends Controller
{
    function index(){
        $companiesData = Company::query()
                        ->orderBy('name', 'ASC')
                        ->paginate(10);

        return view('companies', [
            'companiesData' => $companiesData
        ]);
    }

    function view($id){
        $company = Company::find($id);
        $companyEmployees = Employee::where('company', $id)->paginate(10);

        return view('company_details', [
            'companyEmployees' => $companyEmployees,
            'company' => $company
        ]);
    }

    function update($id, Request $request){
        $company = Company::findOrFail($id);
        $company->update(
            [
                'name' => $request->input('name-input'),
                'email' => $request->input('email-input'),
                'website' => $request->input('website-input')
            ]
        );

        return redirect()->to('/viewAllCompanies');
    }

    function delete($id){
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->to('/viewAllCompanies');
    }

    function create(){
        return view('new_company');
    }

    function save(Request $request){
        Company::create(
            [
                'name' => $request->input('name-input'),
                'email' => $request->input('email-input'),
                'website' => $request->input('website-input')
            ]
        );

        return redirect()->to('/viewAllCompanies');
    }
}
