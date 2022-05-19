<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Resource::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $resource_type = $request->input('resource_type');
        $resource_data= [
            'topic_id'=> $request->input('topic_id'),
            'title'=> $request->input('title'),
            'description'=> $request->input('description'),
            'resource_type'=> $resource_type,
        ];
        $resource= Resource::create($resource_data);
        $url=null;
        $file= null;
        if($resource_type == '1'){ //type is url
            $urlController = new UrlController();
            $url =$urlController->store($request);
        }else{ //type is file
            $fileController = new FileController();
            $file= $fileController->store($request);
        }
        return response()->json([
            'resource'=> $resource,
            'url'=>$url,
            'file'=>$file,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Resource $resource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resource $resource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resource $resource)
    {
        //
    }
}
