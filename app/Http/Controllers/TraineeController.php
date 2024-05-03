<?php

namespace App\Http\Controllers;
use App\Http\Requests\UpdateTraineeRequest;
use App\Http\Requests\StoreTraineeRequest;
use App\Http\Resources\TraineeResource;
use App\Http\Traits\ApiResponseTrait;
use App\Models\Trainee;
use Illuminate\Http\Request;

class TraineeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;
    public function index()
    {
        $data = Trainee::with(['trainee_Payment','specialization'])->get();
        return $this->ApiResponse(TraineeResource::collection($data), 'All Trainee');
    }

   
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Trainee::create([

            'first_name_ar' => $request->first_name_ar,
            'middle_name_ar' => $request->middle_name_ar,
            'last_name_ar' => $request->last_name_ar,
            'first_name_en' => $request->first_name_en,
            'middle_name_en' => $request->middle_name_en,
            'last_name_en' => $request->last_name_en,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
            'specialization_id'=>$request->specialization_id,


        ]);
        return $this->ApiResponse(TraineeResource::make($data), 'Trainee Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Trainee::with(['trainee_Payment','specialization'])->findOrFail($id);
        return $this->ApiResponse(TraineeResource::make($data), 'Trainee Showed Successfully');
    }

  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Trainee::findOrFail($id);
        $data->update([


            'first_name_ar' => $request->first_name_ar,
            'middle_name_ar' => $request->middle_name_ar,
            'last_name_ar' => $request->last_name_ar,
            'first_name_en' => $request->first_name_en,
            'middle_name_en' => $request->middle_name_en,
            'last_name_en' => $request->last_name_en,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'date' => $request->date,
            'specialization_id'=>$request->specialization_id,



        ]);

        return $this->ApiResponse(TraineeResource::make($data), 'Trainee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Trainee::findOrFail($id);
        $data->delete();
        return $this->ApiResponse(null, 'Trainee deleted successfully');
    }
}
