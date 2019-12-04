<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CategoryService;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $category = CategoryService::all();
        if($category){
            return response()->json([
                "message" => "Categories",
                "data" => $category
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
    public function store(StoreCategoryRequest $request)
    {
        $category = CategoryService::create($request->all());
        $category->save();
        
        if($category){
            return response()->json([
                "message" => "Category created",
                "Category" => $category
            ], 200);
        }
        return response()->json([
            "message" => "Category not created"
        ],404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $category = CategoryService::where('id',$id)->get();
        if($category){
            return response()->json($category,200);
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
    public function update(StoreCategoryRequest $request, $id)
    {
        $category = CategoryService::where('id',$id)->update($request->all());
        if($category){
            return response()->json([
                "message" => "Update Category",
                "categoryUpdate" => $category
            ], 202);
        }
        return response()->json([
            "message" => "Not update Category"
        ], 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $category = CategoryService::where('id',$id)->delete();
        if($category){
            return response()->json([
                "message" => "Category removed"
            ], 202);
        }
        return response()->json([
            "message" => "Not removed"
        ], 404);
    }
}
