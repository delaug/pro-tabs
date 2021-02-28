<?php

namespace App\Http\Controllers\API;

use App\Helpers\ApiHelper;
use App\Http\Controllers\Controller;
use App\Models\Track;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class TrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ApiHelper::response('success', Track::get(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            'instrument_id' => ['required', 'exists:instruments,id'],
            'tune_id' => ['required', 'exists:tunes,id'],
            'tab_id' => ['required', 'exists:tabs,id'],
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());

        $track = Track::create($data->validated());

        return ApiHelper::response('success', Track::find($track->id), Response::HTTP_CREATED, 'Track success created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!$track = Track::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Track with id: ' . $id . ' not found!');

        return ApiHelper::response('success', $track, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!$track = Track::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Track with id: ' . $id . ' not found!');

        $data = Validator::make($request->all(), [
            'instrument_id' => ['required', 'exists:instruments,id,deleted_at,NULL'],
            'tune_id' => ['required', 'exists:tunes,id,deleted_at,NULL'],
            'tab_id' => ['required', 'exists:tabs,id,deleted_at,NULL'],
        ]);

        if ($data->fails())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, 'Validation error', $data->errors());


        $track->update($data->validated());

        return ApiHelper::response('success', Track::find($track->id), Response::HTTP_CREATED, 'Track success updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!$track = Track::find($id))
            return ApiHelper::response('error', null, Response::HTTP_NOT_FOUND, null, 'Track with id: ' . $id . ' not found!');

        if (!$track->delete())
            return ApiHelper::response('error', null, Response::HTTP_BAD_REQUEST, null, 'Track can\'t deleted');

        return ApiHelper::response('success', null, Response::HTTP_OK, 'Track was deleted!');
    }
}
