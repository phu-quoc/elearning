<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        try {
            DB::beginTransaction();
            $resource = Resource::create([
                'topic_id' => $request->topicID,
                'title' => $request->title,
                'description' => $request->description,
                'resource_type' => 1, //is url
            ]);
            if ($request->file('files')) {
                $files = $request->file('files');
                $fileController = new FileController();
                foreach ($files as $file) {
                    $fileController->store($file, $resource->id);
                }
            }

            $url = $request->url;
            if ($url) {
                Url::create([
                    'id' => $resource->id,
                    'url' => $url,
                ]); 
            }
            DB::commit();
            return response()->json([
                // 'data' => $resource->url,
                'message' => 'Tạo tài liệu thành công'
            ], 200);
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json([
                'message' => $exception->getMessage()
            ], 400);
        }
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
