<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\CategoryService;
use App\Http\Requests\StoreServiceRequest;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $service = Service::all();
        if($service){
            return response()->json([
                "message" => "Services",
                "data" => $service
            ],200);
        }
        return response()->json(["message" => "No found"],404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryService $category, StoreServiceRequest $request)
    {
        $newService = Service::create($request->all());
        $newService->category()->associate($category);
        $newService->save();
        if($newService){
            return response()->json([
                "message" => "Created a new service",
                "data" => $newService
            ],201);
        }
        return response()->json(["message" => "No found"],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CategoryService $category, $id)
    {
        //return response()->json($category->services,200);
        $service = Service::where('category_id',$id)->get();
        if($service){
            return response()->json($service,200);
        }
        return response()->json(["message" => "No found"],404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreServiceRequest $request, $id)
    {
        $service = Service::where('id',$id)->update($request->all());
        if($service){
            return response()->json([
                "message" => "Update service",
                "ServiceUpdate" => $service
            ], 202);
        }
        return response()->json([
            "message" => "Not update service"
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $destroyService = Service::where('id',$id)->delete();
        if($destroyService){
            return response()->json([
                "message" => "Service removed"
            ], 200);
        }
        return response()->json([
            "message" => "Not removed"
        ], 404);
    }
}
