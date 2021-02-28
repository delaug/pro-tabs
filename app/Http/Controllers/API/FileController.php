<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Services\FilesFacade;
use App\Services\FilesService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class FileController extends Controller
{
    /**
     * Upload tab file
     *
     * @param Request $request
     * @return array
     */
    public function upload(Request $request)
    {
        $data = Validator::make($request->all(), [
            'attachment.*' => ['required', 'mimes:gtp,gp3,gp4,gp5,gpx,gp,mid.midi,xml,mxl,musicxml,txt,tab,btab,ptb,taf']
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $result = FilesFacade::upload($request->attachment);

        return ApiHelper::response('success', $result, Response::HTTP_OK, 'File success upload', null);
    }
}
