<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\Resource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return URL::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $resource= Resource::create([
                'topic_id'=> $request->topicID,
                'title'=>$request->title,
                'description'=>$request->description,
                'resource_type'=> 2, //is url
            ]);
           
            $url= $request->url;
            if($url){
                $url= Url::create([
                    'id' => $resource->id,
                    'url' => $url,
                ]); 
            }
            DB::commit();
            return response()->json(['resource'=> $resource,'url' => $url]);
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        //
    }
}
