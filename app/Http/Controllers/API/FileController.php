<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\File\UploadFileRequest;
use App\Services\FilesFacade;
use Illuminate\Http\Response;

class FileController extends Controller
{
    /**
     * Upload tab file
     *
     * @param \App\Http\Requests\File\UploadFileRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function upload(UploadFileRequest $request)
    {
        $result = FilesFacade::upload($request->validated()['attachment']);
        return ApiHelper::response('success', $result, Response::HTTP_OK, 'File success upload', null);
    }
}
