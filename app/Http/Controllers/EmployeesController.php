<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;
use App\Http\Requests\EmployeesRequest;
use App\Http\Resources\EmployeesResource;
use App\Http\Traits\ApiResponseTrait;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;
    public function index()
    {
        $data = Employees::with(['branch','specialization'])->get();
        return $this->apiResponse(EmployeesResource::collection($data), 'All employees');

    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeesRequest $request)
    {
        $data = Employees::create([
            'darrebni_id'=>$request->darrebni_id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'birth_date'=>$request->birth_date,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$request->image,
            'salary'=>$request->salary,
            'note'=>$request->note,
            'specialization_id'=>$request->specialization_id,
            'branch_id'=>$request->branch_id,
        ]);
        return $this->ApiResponse(EmployeesResource::make($data), 'Employee Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employees $employee)
    {
        $data = Employees::with(['branch','specialization'])->findOrFail($employee->id);
        return $this->apiResponse(EmployeesResource::make($employee->id),'employee has been selected successfully!');
    }

 

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeesRequest $request, Employees $employee)
    {
        
        $employee->update([
            'darrebni_id'=>$request->darrebni_id,
            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'birth_date'=>$request->birth_date,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'image'=>$request->image,
            'salary'=>$request->salary,
            'note'=>$request->note,
            'specialization_id'=>$request->specialization_id,
            'branch_id'=>$request->branch_id,

        ]);
        
        return $this->ApiResponse(EmployeesResource::make($employee),'Updated employee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employees $employee)
    {
        $employee->delete();
        return $this->apiResponse(EmployeesResource::make($employee), 'Employee Deleted successfully!');
    }

    public function employeesCount()
    {
        $branch=Employees::all()->count();
        return $this->apiResponse($branch, 'All Employees!', 200);

    }
}
