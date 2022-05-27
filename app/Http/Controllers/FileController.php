<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($file, $resouceID)
    {
        $file_data = [
            'resource_id' => $resouceID,
            'name' => $file->getClientOriginalName(),
            'file_attack_path' => FileController::saveFile($file),
        ];
        $file = File::create($file_data);
        return $file;
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }

    //Save file to Google Drive and return its link
    public static function saveFile($file)
    {
        try {
            $fileName = FileController::getFileName($file);
            $googleDriveStorage = Storage::disk('google');
            $googleDriveStorage->put($fileName, file_get_contents($file->getRealPath()));
            $url = Storage::disk('google')->url($fileName);
            return $url;
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    public static function getFileName($file)
    {
        $uuid = Str::uuid()->toString();
        $fileName = $file->getClientOriginalName();
        $fileName = $uuid . "-" . $fileName;
        return $fileName;
    }
}
