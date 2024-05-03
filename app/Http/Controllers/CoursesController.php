<?php

namespace App\Http\Controllers;


use App\Models\Courses;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Http\Traits\ApiResponseTrait;




class CoursesController extends Controller
{

   
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;

    public function index()
    {
        
        $data = Courses::with('trainingBatche')->get();
        return $this->ApiResponse(CourseResource::collection($data), 'All Cousres');
        
    }
/**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $data = Courses::create([
            'name'=>$request->name,
            'prefix' =>$request->prefix,
        ]);
        return $this->ApiResponse(CourseResource::make($data), 'Course Stored Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courses $course)
    {
        $data = Courses::with('trainingBatche')->findOrFail($course->id);
        return $this->ApiResponse(CourseResource::make($data), 'Course Showed Successfuly');
    }

 
    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Courses $course)
    {
        $course->update([
            'name' => $request->name,
            'prefix' => $request->prefix,
        ]);
        return $this->ApiResponse(CourseResource::make($course), 'Course updated successfully');
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courses $course)
    {
        $course->delete();
        return $this->ApiResponse(null, 'Course deleted Successfully');
    }
}
