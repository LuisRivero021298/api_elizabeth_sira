<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parallax;

class ParallaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parallax = Parallax::orderBy('id_image','desc')->limit(1)->get();
        if($parallax){
            return response()->json([
                "message" => "Parallax image",
                "data" => $parallax
            ],200);
        }

        return response()->json('Not found',404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($section)
    {
        $parallax = Parallax::where('name_section',$section)->get();
        if($parallax){
            return response()->json($parallax,200);
        }
        return response()->json(["message" => "No found"],404);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
