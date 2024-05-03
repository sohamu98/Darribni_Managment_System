<?php

namespace App\Http\Controllers;
use App\Models\Branch;
use App\Http\Traits\ApiResponseTrait;
use App\Http\Requests\BranchRequest;
use App\Http\Resources\BranchResource;
use Illuminate\Http\Request;

class BranchesControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ApiResponseTrait;

    public function index()
    {
        $data = Branch::with(['trainingBatche','employee'])->get();
        return $this->ApiResponse(BranchResource::collection($data),'All Branches');

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Branch::create([
            'prefix'=>$request->prefix,
            'name'=>$request->name,
        ]);

        return $this->ApiResponse(BranchResource::make($data),'Branch created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Branch::with(['trainingBatche','employee'])->findOrFail($id);
        return $this->ApiResponse(BranchResource::make($data),'Branch Showed Successfully');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Branch::findOrFail($id);
        $data->update([
                'prefix'=> $request->prefix,
                'name'=>$request->name,
        ]);
        $data->save();

        return $this->ApiResponse(BranchResource::make($data),'Branch Updated Successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Branch::findOrFail($id);
        $data->delete();
        return $this->ApiResponse(null,'Branch Deleted Successfully');
    }
    
}
