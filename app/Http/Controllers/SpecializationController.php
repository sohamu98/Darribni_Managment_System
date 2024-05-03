<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Resources\SpecializationResource;
class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;
    public function index()
    {
        

        $data = Specialization::with(['trainee','employee','coach'])->get();
        $special = SpecializationResource::collection($data);
        return $this->ApiResponse($special,'All Specializations');
    }

  

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Specialization::create([
            'name'=>$request->name,
        ]);
        $special= SpecializationResource::make($data);

        return $this->ApiResponse($special, 'Specialization Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Specialization::with(['trainee','employee','coach'])->findOrFail($id);
        $special = SpecializationResource::make($data);

        return $this->ApiResponse($special,'Specific Specialization');
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Specialization::findOrFail($id);
        $data->update([
            'name'=>$request->name,
        ]);
        $special = SpecializationResource::make($data);
        return $this->apiResponse($special, 'Specialization updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Specialization::findOrFail($id);
        $data->delete();
        return $this->ApiResponse(null,"Specialization Deleted Successfully");
    }
}
