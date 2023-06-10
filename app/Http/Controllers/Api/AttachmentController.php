<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\AttachFile;

class AttachmentController extends Controller
{
     /**
     * @OA\Post(
     *     path="/api/upload/upload-file",
     *     tags={"Upload"},
     *     summary="upload file function ",
     *     description="upload file function",
     *     operationId="uploadFile",
     *     deprecated=false,
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="file",
     *         in="query",
     *         description="file",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     security={ {"bearerAuth": {}} },
     *     @OA\Response(
     *         response=200,
     *         description="successful operation"
     *     ),
     *     @OA\Response(response=401, description="Unauthorized"),
     *     @OA\Response(
     *         response=422,
     *         description="Error"
     *     )
     * )
     */
    public function uploadFile(Request $request)
    {

        // $this->validate($request, [
        //     'file' => 'required|file',
        // ]);
        $upload = '';
        if ($request->hasfile('file')) {

            if(is_array($request->file('file'))){
                foreach ($request->file('file') as $file) {
                    $filename =  time() .$file->getClientOriginalName();
                    $file->storeAs('public/uploaded/' . date("Y-m-d"),$filename);
                    $path = '/uploaded/' . date("Y-m-d") . '/'.$filename;
                    $attachedFile = AttachFile::create([
                        'file_name' =>  $file->getClientOriginalName(),
                        'user_id' =>  auth()->user()->id,
                        'path' => $path,
                    ]);

                    $upload = $upload ? $upload . ',' . $attachedFile->id : $attachedFile->id;
                }
            }else{
                $file = $request->file('file');
                $filename =  time() .$file->getClientOriginalName();
                $file->storeAs('public/uploaded/' . date("Y-m-d"), $filename);
                $path = '/uploaded/' . date("Y-m-d") . '/' .$filename;

                $attachedFile = AttachFile::create([
                    'file_name' =>  $file->getClientOriginalName(),
                    'user_id' =>  auth()->user()->id,
                    'path' => $path,
                 ]);

                $upload = $attachedFile->id;
    
            }
        }
            
        return $this->jsonResponse([
            'code' => 0,
            'data' => strval($upload),
            'message' =>'Upload successful'
        ]);
    }
}
