<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Traits\ApiResponseTrait;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     use ApiResponseTrait;
    public function index()
    {
        $data = User::all();
        return $this->ApiResponse(UserResource::collection($data),'all users');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=> Hash::make($request->password),
            'role'=>$request->role,
        ]);
        $data->createToken($request->userAgent())->plainTextToken;
        return $this->ApiResponse(UserResource::make($data),'User is created');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrFail($id);
        return $this->ApiResponse(UserResource::make($data),'User is Showed');
    }

   
    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $data = User::findOrFail($id);
        $data->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'role'=>$request->role,
        ]);
        return $this->ApiResponse(UserResource::make($data), 'user updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data =User::findOrFail($id);
        if($data->id != Auth::user()->id && Auth::user()->role=1){
            $data->delete();
            return $this->ApiResponse(null, 'user deleted successfully');
        }
        return $this->ApiResponse(null, 'cant  deleted successfully');
    }

     public function updatePassword(Request $request){

        $request->validate([
            'password'=>'required|string|min:6',
            'newPassword'=>'required|string|min:6',
        ]);
        $user = Auth::user();
        $user = Auth::user();
        if ($user && Hash::check($request->password, $user->password)) {
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return $this->ApiResponse(UserResource::make($user), 'user password updated successfully');
        } else {
            return $this->ApiResponse(null, 'old password not correct');
        }
     }

}
