<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TrainingBatch;
use App\Http\Resources\TrainingBatchResource;
use App\Http\Requests\StoreTrainingBatchRequest;
use App\Http\Requests\UpdateTrainingBatchRequest;
use App\Http\Traits\ApiResponseTrait;

class TrainingBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;
    public function index()
    {
        $data = TrainingBatch::with(['course','branch','coach','trainee_Payment'])->get();
        return $this->ApiResponse(TrainingBatchResource::collection($data), 'All Training Batches');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTrainingBatchRequest $request)
    
    {
        $data = TrainingBatch::create([
            'name' => $request->name,
            
            'TrainingBatchID' => $request->TrainingBatchID,
            'price' => $request->price,
            'currency' => $request->currency,
            'days' => json_encode($request->days, true),
            'coach_id'=> $request->coach_id,
            'course_id'=> $request->course_id,
            'branch_id'=> $request->branch_id,
            ]);
            
            return $this->ApiResponse(TrainingBatchResource::make($data), 'Training Batch Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TrainingBatch::with(['course','branch','coach','trainee_Payment'])->findOrFail($id);

        return $this->ApiResponse(TrainingBatchResource::make($data), 'training batch Showed Successfully');
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainingBatchRequest $request, string $id)
    {
        $data = TrainingBatch::findOrFail($id);
        $data->update([
            'name' => $request->name,
            'TrainingBatchID' => $request->TrainingBatchID ? $request->TrainingBatchID : $data->TrainingBatchID,
            'price' => $request->price,
            'currency' => $request->currency,
            'days' => json_encode($request->days, true),
            'coach_id' => $request->coach_id,
            'course_id' => $request->course_id,
            'branch_id' => $request->branch_id,
        ]);
        return $this->ApiResponse(TrainingBatchResource::make($data), 'training Batch updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TrainingBatch::findOrFail($id);
        $data->delete();
        return $this->ApiResponse(null, 'training Batch deleted successfully');
    }
}
