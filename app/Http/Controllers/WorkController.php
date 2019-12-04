<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\Service;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $work = Work::all();
        if($work){
            return response()->json([
                "message" => "Works",
                "data" => $work
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
    public function store(StoreWorkRequest $request, Service $service)
    {
        $newWork = Work::create($request->all());
        $newWork->category()->associate($service);
        $newWork->save();
        if($newWork){
            return response()->json([
                "message" => "Created a new service",
                "data" => $newWork
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
    public function show(Request $request, Service $service, $id)
    {
        //return response()->json($service->work,200);
        $work = Work::where('service_id',$id)->get();
        if($work){
            return response()->json($work,200);
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
    public function update(StoreWorkRequest $request, $id)
    {
        $work = Work::where('id',$id)->update($request->all());
        if($work){
            return response()->json([
                "message" => "Update work",
                "ServiceUpdate" => $work
            ], 202);
        }
        return response()->json([
            "message" => "Not update work"
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyWork = Work::where('id',$id)->delete();
        if($destroyWork){
            return response()->json([
                "message" => "Work removed"
            ], 200);
        }
        return response()->json([
            "message" => "Not removed"
        ], 404);
    }
}
