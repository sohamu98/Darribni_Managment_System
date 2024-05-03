<?php

namespace App\Http\Controllers;

use App\Models\TraineePayment;
use Illuminate\Http\Request;
use App\Http\Requests\TraineePaymentRequest;
use App\Http\Resources\TraineePaymentReosource;
use App\Http\Traits\ApiResponseTrait;
class TraineePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;

    public function index()
    {
        $data = TraineePayment::with(['trainingBatche','trainee'])->get();
        return $this->ApiResponse(TraineePaymentReosource::collection($data),'All trainee Payments');
    }

  
    /**
     * Store a newly created resource in storage.
     */
    public function store(TraineePaymentRequest $request)
    {
        $data = TraineePayment::create([
            'trainee_Payment'=>$request->trainee_Payment,
            'trainee_id'=>$request->trainee_id,
            'training_batch_id'=>$request->training_batch_id,
           
        ]);
        return $this->ApiResponse(TraineePaymentReosource::make($data),'trainee Payments Created');
    }

    /**
     * Display the specified resource.
     */
    public function show(TraineePayment $trainee_Payment)
    {
        $data = TraineePayment::with(['trainingBatche','trainee'])->find($trainee_Payment->id);
        return $this->ApiResponse(TraineePaymentReosource::make($data),'The trainee Payments');
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(TraineePaymentRequest $request, TraineePayment $trainee_Payment)
    {
        $trainee_Payment->update([
            'trainee_Payment'=>$request->trainee_Payment,
            'trainee_id'=>$request->trainee_id,
            'training_batch_id'=>$request->training_batch_id,


        ]);
        return $this->ApiResponse(TraineePaymentReosource::make($trainee_Payment),'trainee Payments Updated');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TraineePayment $trainee_Payment)
    {
        $trainee_Payment->delete();
        return $this->ApiResponse(TraineePaymentReosource::make($trainee_Payment),'trainee Payments Deleted');
    }
}
