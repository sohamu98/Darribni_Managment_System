<?php

namespace App\Http\Controllers;

use App\Models\Coach;

use App\Http\Requests\CoachesRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Resources\CoachesResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
class CoachesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;

    public function index()
    {
        $data = Coach::with('trainingBatche')->get();
        return $this->ApiResponse(CoachesResource::collection($data),'All Coaches');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CoachesRequest $request)
    {
        $data = Coach::create([

            'first_name'=>$request->first_name,
            'middle_name'=>$request->middle_name,
            'last_name'=>$request->last_name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'birth_date'=>$request->birth_date,
            'image'=>$request->image,
            'notes'=>$request->notes,
           'salary_sp'=>$request->salary_sp,
           'salary_us'=>$request->salary_us,
           'CoachID'=>$request->CoachID,
           'specialization_id'=>$request->specialization_id,
        ]);
        return $this->ApiResponse(CoachesResource::make($data),'Coache Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Coach::with('trainingBatche')->findOrFail($id);
        $this->ApiResponse(CoachesResource::make($data),'All Coache Showed Successfully');
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(CoachesRequest $request, string $id)
    {
        $data = Coach::findOrFail($id);
        if($request->has('image')&& $request->image != $data->image){
            Storage::disk('public')->delete($data->image);
            $request->file('image')->store('images','public');
        }
        $data->update([

            'first_name'=>$request->first_name ? $request->first_name : $data->first_name,
            'middle_name'=>$request->middle_name ? $request->middle_name : $data->middle_name,
            'last_name'=>$request->last_name ? $request->last_name : $data->last_name,
            'phone'=>$request->phone ? $request->phone : $data->phone,
            'address'=>$request->address ? $request->address : $data->address,
            'email'=>$request->email ? $request->email : $data->email,
            'birth_date'=>$request->birth_date ? $request->birth_date : $data->birth_date,
            'image'=>$request->image ? $request->image : $data->image,
            'notes'=>$request->notes ? $request->notes : $data->notes,
           'salary_sp'=>$request->salary_sp ? $request->salary_sp : $data->salary_sp,
           'salary_us'=>$request->salary_us ? $request->salary_us : $data->salary_us,
           'CoachID'=>$request->CoachID ? $request->CoachID : $data->CoachID,
           'specialization_id'=>$request->specialization_id ? $request->specialization_id : $data->specialization_id,
        ]);
        return  $this->ApiResponse(CoachesResource::make($data),'Coache Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Coach::findOrFail($id);
        $data->delete();
        return  $this->ApiResponse(CoachesResource::make($data),'Coache Deleted Successfully');
    }
    
    public function coachesCount()
    {
        $branch=Coach::all()->count();
        return $this->apiResponse($branch, 'All Coaches!', 200);

    }
}
