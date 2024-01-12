<?php

namespace App\Http\Controllers\api;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CarsResource;
use Illuminate\Support\Facades\Validator;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return new CarsResource(true,"Data Cars Finded!",$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'model' => 'required|unique:cars',
            'year' => 'required|integer|min:0|max:2024',
            'vclass' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }else{
            $cars = Car::create([
                'model' => $request->model,
                'year' => $request->year,
                'vclass' => $request->vclass,
            ]);

            return new CarsResource(true,'Data Successfully Saved!',$cars);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cars = Car::find($id);

        if($cars){
            return new CarsResource(true, "Data Selected!",$cars);
        }else{
            return response()->json([
                'message' => 'Data not found!',
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'model' => 'required|unique:cars',
            'year' => 'required|integer|min:0|max:2024',
            'vclass' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(),422);
        }else{
            $cars = Car::find($id);
            if($cars){
                $cars->model = $request->model;                  
                $cars->year = $request->year;                  
                $cars->vclass = $request->vclass;                  
                $cars->save();     
                
                return new CarsResource(true,'Data Successfully Updated!',$cars);
            }else{
                return response()->json([
                    "message" => "Data Not Found!"
                ],422);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cars = Car::find($id);

        if($cars){
            $cars->delete();

            return new CarsResource(true,'Data Successfully Deleted!','');
        }else{
            return response()->json([
                "message" => "Data Not Found!"
            ],422);
        }
    }
}
